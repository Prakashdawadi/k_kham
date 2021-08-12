<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Carbon\Carbon; 
use Mail; 

use Session;

class UserController extends Controller
   {


    use AuthenticatesUsers;

 



         public function user_login()
    {

      $data = DB::table('bannners')->select('bans_image')
      ->where('bans_status','active')->get();

     // dd($data);
     
       return view('frontend.users.user_login',['datas'=>$data]);
        
    }
    public function user_signup(){


  return view('frontend.users.user_signup');

    }

            
             public function usersignup(Request $request){
                   // return $request->post();
              if($request->isMethod('post')){

                $data = $request->all();
                 $password =  $request->user_password;
                //dd($data);
                $usercount = User::where('email',$data['user_email'])->count();
                if($usercount>0){
                  $request->session()->flash('error', "email already exists");
                  return redirect()->back();

                }else{

                   $this->validate($request,[
                  'name'             => 'required|max:50|min:3|string',
                  'user_email'       => 'required|max:100|min:8|string|email',
                  'user_num'         => 'required|numeric|min:5',
                  'user_password'    => 'required|max:20|min:3|string',
                

        
        
     ]);

                    $data = new User;                     
                 $data->name        = $request->post('name');
                 $data->email       = mb_strtolower($request->post('user_email'));
                 $data->phone       = $request->post('user_num');
                 $data->password    = Hash::make($password);
                 $data->status      = 'active';
                 $data->role        = 'customer';
                  
                   $data->save();



                  if($data){

                 $request->session()->put('USER_LOGIN', true);
                 $request->session()->put('name', $data->name);
                 $request->session()->put('email', $data->email);
                 $request->session()->put('id',$data->id);
                 $request->session()->flash('success','user has beeen created successfully');
                      return redirect('index');

                  }else{

                      $request->session()->flash('error', 'user cannot created ');
                         return redirect('index/user_signup');
                  }
                 
                }
              }
  		

               }
              
       				

               public function  userlogout(Request $request){

               $request->session()->flush();
                   
                   return redirect('index');
                 }


               public function userlogin(Request $request){

                $validate = $this->Validate($request,[
                  'user_email'    => 'required|email|exists:users,email',
                  'user_password' => 'required|string|min:3'


                ]);
               

                 $email      = $request->post('user_email');
                  $password   = $request->post('user_password');

                 $data = USER::where(['email'=>$email])->first();
                 if($data){
 
                if(Hash::check($request->post('user_password'),$data->password)){

                  if($data->status =='active'){
                   if($data->role =='customer'){


               $request->session()->put('USER_LOGIN', true);
               $request->session()->put('name', $data->name);
                $request->session()->put('email', $data->email);
                $request->session()->put('id',$data->id);
                $request->session()->flash('success','welcome to the homepage');
                                 return redirect('index');
                             }
                  else{
                    $request->session()->flash('error', ' sorry you are not a user ');
                                 return redirect()->back();

                  }
        

              }else{

                $request->session()->flash('error', ' your status is inactive ');
                         return redirect()->back();

              }


            }else{

              $request->session()->flash('error', 'please enter  valid password ');
                       return redirect('index/users/user_login')->withInput($request->only('user_email'));
            }


           }else{
              $request->session()->flash('error', 'please enter  valid email ');
                        return redirect('index/users/user_login');

           }
          
                 
            }



        public function forgotpassword(Request $request){


          return  view('frontend.users.forgot_password');

        }


        public function verifyemail(Request $request){

         //dd($request->post());
           $email  = $request->post('user_email');

        $verifyemail =  User::where(['email'=>$email])->first();

        //dd($verifyemail);

        if($verifyemail){
         // dd('email verifies');

            $token = str_random(64);

      DB::table('users')->insert(
          ['email' => $email, 'remember_token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
          $message->to($email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');





        }else{

            $request->session()->flash('error', 'please provide valid address');
           return  redirect()->back();
        }




        }


        public function track(){

         // dd('hello track');


          return view('frontend.track.trackorder');

        }


        public function searchtrack(Request $request){

         // dd($request->Search);

         $Searchid = $request->Search;

          $fetch = DB::table('orders')->select('status')
          ->where('order_id', $Searchid)->first();

         // dd($fetch);

          if($fetch){

            return ['data'=>'Your Food is being: ','mg'=>$fetch];

          }else{


            return ['msg'=>'Invalid Order ID!! Please provide valid Order ID'];

          }
      
        }


        public function usereditview(){

          $id = Session::get('id');
          $email = Session::get('email');

          //dd($email);

          $arr = DB::table('users')
           ->where('id',$id)
           ->where('email',$email)->get();

         //  dd($arr);


           $data['name']  = $arr['0']->name;
           $data['email']  = $arr['0']->email;
           $data['phone']  = $arr['0']->phone;
           $data['id']    = $arr['0']->id;

           return view ('frontend.users.user_edit_view',$data);



        }


        public function usereditsubmit(Request $request){

         // dd($request->post());

          $name     = $request->name;
          $email    = $request->email;
          $phone    = $request->number;
        
          $password = $request->password;

          
           // dd($hash);
          $id       = $request->id;


          $request->validate([

            'name'     =>'required|string|min:3|max:20',
            'phone'    =>'numeric|min:3|max:10',
            'hash'  =>'string|nullable|min:3',



          ]);
       

             // dd($request->post());

          if(isset($password) && !empty($password)){

           // dd('update password section');

              $hash = Hash::make($password);

             $update = DB::update('update users set

            name      = ?,
            phone     = ?,
            password  = ?
            where id = ?' ,

            [$name,$phone, $hash ,$id]);

           
          }else{
           //  dd(' password  not updated section');

             $update = DB::update('update users set

            name      = ?,
            phone     = ?
          
            where id = ?' ,

            [$name,$phone,$id]);
          
       


          }

          $request->session()->flash('success', "your info is changed succesfully");
          return redirect('index/user/manage');




         

        }
                  
              

}