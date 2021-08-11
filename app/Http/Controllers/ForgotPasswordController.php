<?php

namespace App\Http\Controllers;

use App\Models\ForgotPassword;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;

use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon; 
use Mail; 
use Hash;

use Session;
use DB;

class ForgotPasswordController extends Controller
{
    

         public function forgotpassword(Request $request){


          //dd('forgotpassword');


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

      DB::table('forgot_passwords')->insert(
          ['email' => $email, 'remembertoken' => $token, 'created_at' => Carbon::now()]
      );


DB::update('update users set

           remember_token      = ?
         
          
            where email = ?' ,

            [$token,$email]);



/*
      DB::table('users')->update('remember_token' : $token)
          ->where('email',$email);
*/






      Mail::send('custom_auth.verify', ['token' => $token], function($message) use($request){
          $message->to($request->user_email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('success', 'We havesend an email to your account!');





        }else{

            $request->session()->flash('error', 'please provide valid address');
           return  redirect()->back();
        }


        }



        public function getpassword($token){

          //dd($token);

            $email = DB::table('forgot_passwords')->select('email')
            ->where('remembertoken',$token)->get();

           //dd($email);

            return view('custom_auth.getpassword',['token' => $token,'emails'=>$email]);


            //dd('hello');

        }

        public function updatepassword(Request $request){

          $token = $request->token;

        

           // dd($request->post());


          $request->validate([
      'email'                 =>'required|email',
      'password'              =>'required|string|min:3|confirmed',
      'password_confirmation' =>'required',

  ]);
          // dd($token);

         $updatepassword = DB::table('forgot_passwords')
                      ->where(['email' => $request->email, 'rememberToken' => $request->token])
                      ->first();




        // here validate the token with insert token withs user remember me and forgotpassword token

                 // dd($updatepassword);
          $userstoretoken = DB::table('users')->select('remember_token')
                        ->where('email',$request->email)->first();

    
               // dd( $userstoretoken);


     if($token ==  $userstoretoken->remember_token  && $token ==  $updatepassword->rememberToken){

          //dd(' same');

           $email = $request->email;
         $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

                $users = User::where('email', $request->email)
                ->update(['remember_token' => null]);


                 //dd($users);

       DB::table('forgot_passwords')->where(['email'=> $request->email])->delete();

    return redirect('index/users/user_login')->with('success', 'Your password has been changed!');


       
        }else{


           return back()->withInput()->with('error', 'broken token!');

        }






 /* if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }*/

   /* $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('forgot_passwords')->where(['email'=> $request->email])->delete();

    return redirect('index/users/user_login')->with('success', 'Your password has been changed!');
*/



        }





        public function vendorforgotpassword(){

          //dd("hello");

          return view('frontend.vendor.vendorforgotpassword.forgotpassword');


        }



        public function verifyvendoremail(Request $request){

        // dd($request->post());


           $email  = $request->post('ven_email');

        $verifyemail =  Vendor::where(['ven_email'=>$email])->first();

        //dd($verifyemail);

        if($verifyemail){
         // dd('email verifies');

            $token = str_random(64);

            DB::update('update vendors set

           remember_token      = ?
         
          
            where ven_email = ?' ,

            [$token,$email]);



      DB::table('forgot_passwords')->insert(
          ['email' => $email, 'remembertoken' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('custom_auth.verify_vendor', ['token' => $token], function($message) use($request){
          $message->to($request->ven_email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('success', 'We havesend an email to your account!');





        }else{

            $request->session()->flash('error', 'please provide valid address');
           return  redirect()->back();
        }

        }


        public function getvendorpassword($token){

       //  dd($token);

           $email = DB::table('forgot_passwords')->select('email')
            ->where('remembertoken',$token)->get();

           //dd($email);

            return view('custom_auth.getvendor_password',['token' => $token,'emails'=>$email]);




        }

        public function updatevendorpassword(Request $request){

         $token = $request->token;

        

           // dd($request->post());


          $request->validate([
      'email'                 =>'required|email',
      'password'              =>'required|string|min:3|confirmed',
      'password_confirmation' =>'required',

  ]);
          // dd($token);

         $updatepassword = DB::table('forgot_passwords')
                      ->where(['email' => $request->email, 'rememberToken' => $request->token])
                      ->first();




        // here validate the token with insert token withs user remember me and forgotpassword token

                 // dd($updatepassword);
          $userstoretoken = DB::table('vendors')->select('remember_token')
                        ->where('ven_email',$request->email)->first();

    
               // dd( $userstoretoken);


     if($token ==  $userstoretoken->remember_token  && $token ==  $updatepassword->rememberToken){

          //dd(' same');

           $email = $request->email;
         $user = Vendor::where('ven_email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

                $vendors = Vendor::where('ven_email', $request->email)
                ->update(['remember_token' => null]);


                 //dd($vendors);

       DB::table('forgot_passwords')->where(['email'=> $request->email])->delete();

    return redirect('vendor/login')->with('success', 'Your password has been changed!');


       
        }else{


           return back()->withInput()->with('error', 'broken token!');

        }






 /* if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }*/

   /* $Vendors = Vendors::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('forgot_passwords')->where(['email'=> $request->email])->delete();

    return redirect('index/users/user_login')->with('success', 'Your password has been changed!');
*/



        }




}
