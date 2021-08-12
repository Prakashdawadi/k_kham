<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Vendor;
use Hash;
use Validator;

class AdminController extends Controller
{
     use AuthenticatesUsers;

    public function admin(Request $request){

                    
           if($request->session()->has('ADMIN_LOGIN')){

          
                    return view('admin.dashboard');
                 }else{
                     $request->session('success', 'thank you 4 using k kham');
                    return view('admin.login');   

                 }       
                                                                   
        }

              public function adminlogin(Request $request){

                $email = $request->email;

             $data = Admin::where('email',$email)->first();

                 if($data){
 
                if(Hash::check($request->post('password'),$data->password)){

                  if($data->status =='active'){
                   if($data->role =='Super Admin' || $data->role =='Admin'){
                    
               $request->session()->put('ADMIN_LOGIN', true);
               $request->session()->put('name', $data->name);
                $request->session()->put('email', $email);
                $request->session()->put('id',$data['id']);
                $request->session()->flash('success','welcome to the Dashboard');
                                 return redirect('admin/dashboard');
                             
                             }
                  else{
                    $request->session()->flash('error', ' sorry you are not a admin ');
                                 return redirect()->back();

                  }


               

              }else{

                $request->session()->flash('error', ' your status is inactive ');
                         return redirect()->back()->withInput($request->only('email'));

              }





            }else{

              $request->session()->flash('error', 'please enter  valid password ');
                           return redirect()->back()->withInput($request->only('email'));
            }


           }else{
              $request->session()->flash('error', 'please enter  valid email ');
                        return redirect()->back()->withInput($request->only('email'));

           }


     
               
                 
            
        
}

         public function adminlogout(Request $request){

           if($request->session()->has('ADMIN_LOGIN')){
            $request->Session()->flush();
          
            $request->session()->flash('success', ' Thank you for Using K Kham');
             return redirect('admin');
           }else{

                $request->session()->flash('error','Please login to Continue');
                      return view('admin.login'); 
                                }
           
         } 

                      public function updatepassword(){

                            $update = Admin::find(1);
                            $update->password = Hash::make('admin');
                            $update->save();



      }

      public function dashboard(Request $request){


           if($request->session()->has('ADMIN_LOGIN')){
             $request->session()->flash('success','welcome to the home page');

            
                    return view('admin.dashboard');
                 }else{
                     $request->session('success', 'please login to continue');
                    return view('admin.login');   

                 }       

      }

      public function adminvieworder(){


       // dd('hello');

      $all['result'] = DB::table('orders')
      ->orderBy('updated_at','DESC')
      ->paginate(5);

     // dd($all);

      return view('admin.order.adminvieworder',$all);



      }

      public function inactivevendor(){
       // dd("hello");

        $inactive = DB::table('vendors')->where('ven_status','inactive')->paginate(5);

       /// dd($inactive);


        return view('admin.vendor_manage.inactive_vendor',['data'=>$inactive]);


      }


      public function  editinactivevendor(Request $request,$id){

         if($id>0){
            $match = Vendor::where('id', $id)->exists();  
                   
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
       
              $edit = Vendor::where(['id'=> $id])->get(); 

       // dd($id); 

                $data ['name']                  =  $edit['0']->name;
                $data['rest_address']           =  $edit['0']->address;
                $data['rest_email']             =  $edit['0']->ven_email;
                $data['rest_phone']             =  $edit['0']->phone; 
                $data['rest_status']            =  $edit['0']->ven_status;
                $data['id']                    =  $edit['0']->id;
                $data['role']                   =  $edit['0']->role;
                $data['rest_name']              =  $edit['0']->resturant_name;

               // dd($data['rest_name']);

                return view('admin.vendor_manage.inactive_vendor_edit',$data);




      }
    }


    public function inactivendorupdate(Request $request){
     
      $name  = $request->name;
      $email = $request->email;
       $phone = $request->phone;
        $address = $request->address;
         $rest_name = $request->rest_name;
          $role = $request->role;
           $id = $request->id;
            $status = $request->status;
            //dd($status);
     

        $request->validate([
           'name'             =>  'required|string|min:3',
           'address'          =>  'required|string|min:3',
           'email'            =>  'required|email',
            'phone'            =>  'required|numeric|min:3',
           'rest_name'         =>    'required|string|min:3',
            'role'             =>    'required',
                 
           'status'            =>  'required|in:active,inactive',

        ]);

        $email_match = DB::table('resturants')->select('id')

        ->where('rest_email',$email)->first();

         if($email_match == null){
          $request->session()->flash('error', "first add the resturant of this vendor then only  then make the vendor active");
          return redirect('admin/vendor/inactive');

        }

        $sameid = $email_match->id;
      

     $data = DB::update('update vendors set 
      resturant_id = ?,   
      name = ? ,
       ven_email = ? ,
        phone = ? ,
         address = ? ,
          resturant_name = ? ,
          ven_status = ? ,
           role = ? 
           
      where id = ?', 
      [$sameid,$name,$email,$phone,$address,$rest_name,$status,$role , $id]);

              if($data){
  

              $request->session()->flash('success', "vendor  status has been changed");

             return redirect('admin/vendor/inactive');


              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "vendor status cannot be chaneged in this moment or you have not changed anything");

             return redirect('admin/vendor/inactive');

              }


    }


    public function activevendor(){

      $active = DB::table('vendors')
      ->where('ven_status','active')->paginate(5);
     

      return view('admin.vendor_manage.active_vendor',['data'=>$active]);






    }




    public function editactivevendor($id){

     // dd('hello',$id);



         if($id>0){
            $match = Vendor::where('id', $id)->exists();  
                   
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
       
              $edit = Vendor::where(['id'=> $id])->get(); 

       // dd($id); 

                $data ['name']             =  $edit['0']->name;
                $data['rest_address']           =  $edit['0']->address;
                $data['rest_email']             =  $edit['0']->ven_email;
                $data['rest_phone']             =  $edit['0']->phone; 
                $data['rest_status']            =  $edit['0']->ven_status;
                $data['id']                 =  $edit['0']->id;
                $data['role']                 =  $edit['0']->role;
                $data['rest_name']              =  $edit['0']->resturant_name;

               // dd($data['rest_name']);

                return view('admin.vendor_manage.active_vendor_edit',$data);




      }
    





    }



    public function activendorupdate(Request $request){

      //dd('hello');

      //dd($request->post());

       $name  = $request->name;
      $email = $request->email;
       $phone = $request->phone;
        $address = $request->address;
         $rest_name = $request->rest_name;
          $role = $request->role;
           $id = $request->id;
            $status = $request->status;
            //dd($status);
     

        $request->validate([
           'name'             =>  'required|string|min:3',
           'address'          =>  'required|string|min:3',
           'email'            =>  'required|email',
            'phone'            =>  'required|numeric|min:3',
           'rest_name'         =>    'required|string|min:3',
            'role'             =>    'required',
                 
           'status'            =>  'required|in:active,inactive',


        ]);
        

        $email_match = DB::table('resturants')->select('id')

        ->where('rest_email',$email)->first();

        //dd($email_match->id);

        $sameid = $email_match->id;




     $data = DB::update('update vendors set 
      resturant_id = ?,   
      name = ? ,
       ven_email = ? ,
        phone = ? ,
         address = ? ,
          resturant_name = ? ,
          ven_status = ? ,
           role = ? 
           
      where id = ?', 
      [$sameid,$name,$email,$phone,$address,$rest_name,$status,$role , $id]);
     // dd($request->post());
       /*$affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1])*/
              if($data){
               // dd('updated');

              $request->session()->flash('success', "vendor  status has been changed");

             return redirect('admin/vendor/active');


              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "vendor status cannot be chaneged in this moment or you have not changed anything");

             return redirect('admin/vendor/active');

              }




    }


    public function deleteinactivevendor(Request $request,$id){


      //dd('hello',$id);

      $delete = DB::table('vendors')

      ->where('id',$id)->delete();

      //dd($delete);


       if($delete){
               // dd('updated');

              $request->session()->flash('success', "vendor  has been deleted");

             return redirect('admin/vendor/inactive');


              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "vendor cnnot be deleted");

             return redirect('admin/vendor/inactive');

              }





    }


    public function deleteactivevendor(Request $request,$id){

      //dd("");

      $delete = DB::table('vendors')

      ->where('id',$id)->delete();

      //dd($delete);


       if($delete){
               // dd('updated');

              $request->session()->flash('success', "vendor  has been deleted");

             return redirect('admin/vendor/active');


              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "vendor cnnot be deleted");

             return redirect('admin/vendor/active');

              }








    }


    public function adminuserlist(){

     // dd('hello');

      $all_user = DB::table('users')->
     orderBy('updated_at','DESC')->paginate(5);

      //dd($all_user);

      return view('admin.user_manage.user_manage_list',['data'=>$all_user]);





    }


   public function edituserbyadmin($id){

   // dd("hello",$id);

         if($id>0){
            $match = User::where('id', $id)->exists();  
                   
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
       
              $edit = User::where(['id'=> $id])->get(); 

       // dd($id); 

                $data ['name']                  =  $edit['0']->name;
                        
                $data['email']                  =  $edit['0']->email;
                $data['phone']                  =  $edit['0']->phone; 
                $data['status']                 =  $edit['0']->status;
                $data['id']                     =  $edit['0']->id;
                $data['role']                   =  $edit['0']->role;
              

               // dd($data['rest_name']);

                return view('admin.user_manage.user_manage_list_edit',$data);

      }
    


   }


   public function adminupdateuser(Request $request){

   // dd('hello');

    $name  = $request->name;
      $email = $request->email;
       $phone = $request->phone;
      
      
          $role = $request->role;
           $user_id = $request->id;
            $status = $request->status;

    

     $request->validate([
           'name'             =>  'required|string|min:3',
          
           'email'            =>  'required|email',
            'phone'            =>  'required|numeric|min:3',
         
            'role'             =>    'required',
                 
           'status'            =>  'required|in:active,inactive',


        ]);

    // dd($request->post());
        
      $data = DB::update('update users set 
      
      name = ? ,
       email = ? ,
        phone = ? ,              
          status = ? ,
           role = ? 
           
      where id = ?', 
      [$name,$email,$phone,$status,$role , $user_id]);

//dd($request->post());

            if($data){
               // dd('updated');

              $request->session()->flash('success', "user Info has been changed");

             return redirect('admin/user/list');


              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "user info cannot be changed at this moment");

             return redirect('admin/user/list');

              }


   }


   public function deleteuserbyadmin(Request $request,$id){

   // dd("hello",$id);

      if($id>0){
            $match = User::where('id', $id)->exists();  
                   
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/user/list');
                }

                $delete = DB::table('users')

      ->where('id',$id)->delete();

      //dd($delete);

       if($delete){
               // dd('updated');

              $request->session()->flash('success', "user  has been deleted");

             return redirect('admin/user/list');

              }else{

             //  dd('data not updated');


                 $request->session()->flash('error', "user cnnot be deleted");

             return redirect('admin/user/list');
              }

}

   }


   public function dashboardview(){


    //dd('hello dashboard');

    return view('admin.admin_dashboard.dashboard');




   }


   static function usercount(){

    return DB::table('users')->count();

   }

  static function resturantcount(){

    return DB::table('resturants')->count();

   }

   static function inactiveresturantcount(){

    return DB::table('resturants')
      ->where('rest_status','inactive')
    ->count();

   }


   static function activeresturantcount(){

    return DB::table('resturants')
      ->where('rest_status','active')
    ->count();

   }
   
     static function vendor(){

    return DB::table('vendors')
      
    ->count();

   }


   static function active_vendor(){

    return DB::table('vendors')
    ->where('ven_status','active')
      
    ->count();

   }

   static function inactive_vendor(){

    return DB::table('vendors')
    ->where('ven_status','inactive')
      
    ->count();

   }

 static function requested_vendor(){

    return DB::table('vendors')
    ->where('resturant_id',null)
      
    ->count();

   }


   static function all_menu(){

    return DB::table('menus')
         
    ->count();

   }


   static function active_menu(){

    return DB::table('menus')
    ->where('menu_status','active')
         
    ->count();

   }

   static function inactive_menu(){

    return DB::table('menus')
    ->where('menu_status','inactive')
         
    ->count();

   }


    static function all_order(){

    return DB::table('orders')

         
    ->count();

   }

   


}
