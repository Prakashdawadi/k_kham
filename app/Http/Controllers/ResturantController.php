<?php

namespace App\Http\Controllers;

use App\Models\Resturant;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Hash;
use Session;


class ResturantController extends Controller
{
     public function list_resturant()
    {

        $data['result'] = Resturant::orderBy('updated_at','DESC')->paginate(5);

       return view('admin.resturant.list_resturant',$data);
    }

     public function add_resturant(Request $request, $id=''){

         // $fetch['result'] = Category::select('cats_name','id')->get();

            //dd($fetch);
        //->get dd($fetch['results']);

       // return $request->post();

         if($id>0){
            $match = Resturant::where('id', $id)->exists();  
                   
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
           
                 $arr = Resturant::where(['id'=> $id])->get();                 

                $data['rest_name']       =  $arr['0']->rest_name;
                $data['rest_address']    =  $arr['0']->rest_address;
                $data['rest_email']      =  $arr['0']->rest_email;
                $data['rest_phone']      =  $arr['0']->rest_phone; 
                $data['rest_otime']      =  $arr['0']->rest_otime;
                $data['rest_ctime']      =  $arr['0']->rest_ctime;
                $data['rest_image']      =  $arr['0']->rest_image;
                $data['rest_cimage']     =  $arr['0']->rest_cimage;
               /* $data['category_id']     =  $arr['0']->category_id; */
                $data['rest_status']     =  $arr['0']->rest_status;
                $data['id']              =  $arr['0']->id;
                                  
            return view('admin.resturant.add_resturant' ,$data/*, $fetch*/);

            }           
           
            else{
                  
                $data['rest_name']       =  '';
                $data['rest_address']    =  '';
                $data['rest_email']      =  '';
                $data['rest_phone']      =  ''; 
                $data['rest_otime']      =  '';
                $data['rest_ctime']      =  '';
                $data['rest_image']      =  '';
                $data['rest_cimage']      =  '';
                /*$data['category_id']        =  '';*/
                $data['rest_status']     =  '';
                $data['id']              =   0;              
                return view('admin.resturant.add_resturant',$data/*, $fetch*/);
            }    
    }
             
             public function submit(Request $request){

                   $email = session::get('email');

          // dd($request->post());

               // $password = $request->post('vendor_name');
     
             // $request->validate([
/*
            'cats_name'     => 'required',
            'cats_slug'     => 'required|unique:categories,cats_slug,'   .$request->post('id'),
            'cats_image'    => 'mimes:png,jpeg,jpg|required|required_without:id',
            'status'        => 'required|in:active,inactive',
           */

        //]);
        
            if($request->post('id')>0){

             $request->validate([

            'rest_name'         =>  'required|min:3|max:20',
            'rest_address'      =>  'required|min:5|max:30',
            'rest_email'        =>  'required|email|unique:resturants,rest_email,'.$request->post('id'),
            'rest_phone'        =>  'required|numeric|min:4',
            'rest_otime'        =>  'required',
            'rest_ctime'        =>  'required',
            'rest_image'        =>  'mimes:png,jpeg,jpg',
            'rest_cimage'       =>  'mimes:png,jpeg,jpg',
           
            'rest_status'       =>  'required|in:active,inactive',

            

        ]);
        
         
                
                $data = Resturant::find($request->post('id'));
              //  dd($data);
                $msg = "data has been updated succesfully";


            }else{


               
                 //  dd($request->post());
                  $data = new Resturant;

                  $msg  = "Data has been inserted succesfully";
        
                 $request->validate([
            'rest_name'        =>  'required',
            'rest_address'     =>  'required|',
            'rest_email'       =>  'required|unique:resturants',
            'rest_phone'       =>  'required',
            'rest_otime'       =>  'required',
            'rest_ctime'       =>  'required',
            'rest_image'       =>  'required|mimes:png,jpeg,jpg',
            'rest_cimage'      =>  'required|mimes:png,jpeg,jpg',
          /*  'category_id'       =>  'required',*/
            'rest_status'      =>  'required|in:active,inactive',


           



        ]);
                  // dd($request->post());
                
            //return $request->post();
                 
                 
            }

      
                 $data->rest_name             = $request->post('rest_name');
                 $data->rest_address          = $request->post('rest_address');
                 $data->rest_email            = $request->post('rest_email');
                 $data->rest_phone            = $request->post('rest_phone');
                 $data->rest_otime            = $request->post('rest_otime');
                 $data->rest_ctime            = $request->post('rest_ctime');
                /* $data->category_id            = $request->post('category_id');*/
                 $data->rest_status           = $request->post('rest_status');
                 $data->added_by        =      $email;       

                 

                 // resturant image






           
                if($request->hasfile('rest_image')){
                    $imagepath = public_path('images/resturant/'.$data->rest_image);
                    ($imagepath);
                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);                    
                }
                    }
                    
                        
                    $file          = $request->file('rest_image');                
                    $ext           = $file->getClientOriginalExtension(); 
                    $file_name     = "img-".date('H-m-d-h-i-s').".".$ext; 
                    //Image::make($file)->resize(800,400)->save($file_name);               
                    $request->file('rest_image')->move('images/resturant', $file_name);
                             
                     $data->rest_image = $file_name;
             }  

                // resturant cover image           
                if($request->hasfile('rest_cimage')){
                    $imagepath1 = public_path('images/resturant/cover/'.$data->rest_cimage);
                    ($imagepath1);
                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath1)){
                        unlink($imagepath1);                    
                }
                    }
                    
                        
                    $file1          = $request->file('rest_cimage');                
                    $ext            = $file1->getClientOriginalExtension(); 
                    $file_cname     = "img-".date('H-m-d-h-i-s').".".$ext; 
                    //Image::make($file)->resize(800,400)->save($file_name);               
                    $request->file('rest_cimage')->move('images/resturant/cover', $file_cname);
                             
                     $data->rest_cimage = $file_cname;
             }             
                      $data->save();

                        if($data){
                        $request->session()->flash('success', $msg);
                        return redirect('admin/resturant/list_resturant');

             }else{
                $request->session()->flash('error', 'error uploading resturant');
                return redirect('admin/resturant/list_resturant');
         }


    }

                 public function delete(Request $request, $id){

       
                    $data = Resturant::find($id);
                   // dd($data);
                    $imagepath = public_path('images/resturant/'.$data->rest_image);

                    $imagepath1 = public_path('images/resturant/cover/'.$data->rest_cimage);

                    //dd($imagepath);

                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                if(File::exists($imagepath1)){
                        unlink($imagepath1);
                    }

                }
                 $success = $data->delete();
                 if($success){
                    $request->session()->flash('success', 'resturant has been deleted');
                    return redirect('admin/resturant/list_resturant');

                 }else{
                    $request->session()->flash('error', 'error deleting data');
                    return redirect('admin/resturant/list_resturant');

        }
    
       
    }



    public function search(Request $request){

      $view =  $request->Search;

      if($view!= ''){

       // dd('not empty');

        $mysearch = Resturant::where('rest_name', 'LIKE', '%'. $view .'%')
        ->where('rest_status','active')->get();




       return view('frontend.search.search',['searches'=>$mysearch]);







      }else{

         //dd(' empty');

       return redirect()->back();
      }


    }

}
