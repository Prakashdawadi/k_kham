<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function Vendor(Request $request){
   //  dd('hello');

     if($request->session()->has('VENDOR_LOGIN')){
     // $request->session()->flash('success','you are already a login user');
        //return view('frontend.vendor.dashboard');

      return view('frontend.vendor.dashboard');
    }else{
                                   
      //$request->session()->flash('error','please login to continue');
        return view('frontend.vendor.vendor_login');
                                }

    }

    public function vendorsignup(){


    return view('frontend.vendor.vendor_signup');



    }

   public function vendorsignupsubmit(Request $request){

              if($request->isMethod('post')){

                $data = $request->all();
                 $password =  $request->password;

                   $this->validate($request,[
                  'name'             => 'required|max:50|min:3|string',
                  'email'            =>  'required|max:100|min:8|email|unique:vendors,ven_email',
                  'num'              => 'required|numeric|min:5',
                  'password'         => 'required|max:20|min:3|string',
                  'rest_name'        => 'required|max:50|min:3|string',
                   'address'         => 'required|max:50|min:3|string',
                

        
        
     ]);

                    $data = new Vendor;  

                 $data->name            = $request->post('name');
                 $data->ven_email       = mb_strtolower($request->post('email'));            
                 $data->password        = Hash::make($password);
                 $data->phone           = $request->post('num');
                $data->resturant_name   = mb_strtolower($request->post('rest_name'));
                 $data->address         = $request->post('address');
                 $data->ven_status      = 'inactive';
                 $data->role            = 'vendor';
                  
                   $data->save();


                  if($data){

                
                 $request->session()->flash('success',' thank u for being the member of k khan team successfully you will be notify after your information is procced');
                      return redirect('vendor/login');

                  }else{

                      $request->session()->flash('error', 'user cannot created ');
                         return redirect('vendor/login');
                  }
                 
              }


   }

    public function vendorlogin(Request $request){

      $validate = $this->Validate($request,[
                  'email'    => 'required|email|exists:vendors,ven_email',
                  'password' => 'required|string|min:3'


                ]);
               

             $password   = $request->post('password');

             $data = Vendor::where(['ven_email'=>$request->email])->first();
             if(Hash::check($request->post('password'),$data->password)){

                  if($data->ven_status =='active'){
                   if($data->role =='vendor'){


               $request->session()->put('VENDOR_LOGIN', true);
               $request->session()->put('name', $data->name);
                $request->session()->put('ven_email', $data->ven_email);
                $request->session()->put('ven_id',$data->ven_id);
                $request->session()->flash('success','welcome to the homepage');

                          return redirect('vendor/dashboard');
                             }
                  else{
                    $request->session()->flash('error', ' sorry you are not a user ');
                                 return redirect('vendor/login');

                  }


               

              }else{

                $request->session()->flash('error', ' your status is inactive ');
                         return redirect('vendor/login');

              }


            }else{

              $request->session()->flash('error', 'please enter  valid password ');
                         return redirect('vendor/login')->withInput($request->only('email'));
            }

           

    }


               public function updatepassword(){

            $update = DB::table('vendors')->select('password')
            ->where('email','prakash.dawadi2@gmail.com')
            ->first();
                            //dd($update);
                  
                        $update->password = Hash::make('admin');
                            dd( $update->password);
                          //$data =  $vendor->save();

                          if($data){
                            dd('password updated');
                          }else{
                            dd('password not updated');
                          }


      }

      public function dashboard(Request $request){
          

      if($request->session()->has('VENDOR_LOGIN')){

   $request->session()->flash('success','welcome to the home page');
        return view('frontend.vendor.dashboard');
      }else{

         $request->session()->flash('error','login to  continue');
          return view('frontend.vendor.vendor_login');

      }

      }

      public function logout(Request $request){
 
      if($request->session()->has('VENDOR_LOGIN')){
           $request->session()->flush();

        $request->session()->flash('success','Thank you being k kham vendor');
          return redirect('vendor/login');
                            
                   }else{
                                   
               $request->session()->flash('error','please login to continue');
                      return view('frontend.vendor.vendor_login');
                                }

      }

     


      public function list_order(){


      $id    = session::get('ven_id');
      $email = session::get('ven_email');

    $data1['result'] = DB::table('orders')->join('vendors','vendors.resturant_id','rest_id')


       ->where('vendors.ven_id',$id)
       ->where('vendors.ven_email', $email)
       ->orderBy('orders.updated_at','DESC')
       ->paginate(5);
    

   return view('frontend.vendor.order_list.all_order',$data1);




      }



      public function order_edit($id){


        $orderedit['rest'] = Order::select('id','order_id' ,'order_items','quantity','all_total','status','user_name','user_address')->orderBy('updated_at','DESC')

       ->where('id',$id)

        ->get();

        return view('frontend.vendor.order_list.order_edit' , $orderedit);



      }


      public function ordereditsubmit(Request $request){

          $updateid  = $request->orderid;

                   if($request->post('orderid')>0){



             $request->validate([

           
            'order_status'   => 'required|in:preparing,ontheway,delivered,cancelled',
          
           

        ]);

           //   dd($request->post());
             $order_status = $request->order_status;

             //dd($order_status);

                  $data = Order::find($request->post('orderid'));
                  $msg = "data has been updated succesfully";



}


   $ok =   DB::update('update orders set status = ? where id = ?',[$order_status, $updateid]);

                $request->session()->flash('success', $msg);
                    return redirect('vendor/order/list_order');


      }


      public function myprofileview(){

      $id = session::get('ven_id');
      $email = session::get('ven_email');

     // dd($id);
      //dd($email);

      $arr = DB::table('vendors')
      ->where('ven_id',$id)
      ->where('ven_email',$email)
      ->get();


      $data['id']        =  $arr['0']->ven_id;
      $data['email']      =  $arr['0']->ven_email;
      $data['name']      =  $arr['0']->name;
      $data['phone']     =  $arr['0']->phone;
      $data['password']  =  $arr['0']->password;

      return view('frontend.vendor.account_edit.edit_view',$data);



      }


      public function editprofilesubmit(Request $request){

        //dd($request->post());



          $name     = $request->name;
          $email    = $request->email;
          $phone    = $request->number;
        
          $password = $request->password;

          
           // dd($hash);
          $id       = $request->id;


          $request->validate([

            'name'     =>'required|string|min:3|max:20',
            'phone'    =>'numeric|min:3|max:10',
            'password'     =>'string|nullable|min:3',



          ]);
       

             // dd($request->post());

          if(isset($password) && !empty($password)){

           // dd('update password section');

              $hash = Hash::make($password);

             $update = DB::update('update vendors set

            name      = ?,
            phone     = ?,
            password  = ?
            where ven_id = ?' ,

            [$name,$phone, $hash ,$id]);

           
          }else{
           //  dd(' password  not updated section');

             $update = DB::update('update vendors set

            name      = ?,
            phone     = ?
          
            where ven_id = ?' ,

            [$name,$phone,$id]);
          
       


          }

          $request->session()->flash('success', "your info is changed succesfully");
          return redirect('vendor/profile/manage');







      }







}
