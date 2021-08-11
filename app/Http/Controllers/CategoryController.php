<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\view;
use App\Models\Resturant;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageServiceProvider; 
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;



class CategoryController extends Controller
{
    public function list_category()
    {

        $data['result'] = Category::orderBy('updated_at','DESC')->get();
       // dd($data);

       return view('admin.category.list_category',$data);
    }

     public function add_category(Request $request, $id=''){

         if($id>0){
            $match = Category::where('id', $id)->exists();  
            /* dd($id);
             die;  */      
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
           
                 $arr = Category::where(['id'=> $id])->get();                 

                $data['cats_name']   =  $arr['0']->cats_name;
                $data['cats_slug']   =  $arr['0']->cats_slug;
                $data['cats_image']  =  $arr['0']->cats_image;
                $data['status']      =  $arr['0']->status;  
                $data['id']          =   $arr['0']->id;
                                  
            return view('admin.category.add_category',$data);

            }           
           
            else{
                  $data['cats_name']   =   '';
                  $data['cats_slug']   =   '';
                  $data['cats_image']  =   '';
                  $data['status']      =   '';
                  $data['id']          =   0;                       
                return view('admin.category.add_category',$data);
            }    
           

    }
             public function submit(Request $request){

            //return $request->post();
     
             // $request->validate([
/*
            'cats_name'     => 'required',
            'cats_slug'     => 'required|unique:categories,cats_slug,'   .$request->post('id'),
            'cats_image'    => 'mimes:png,jpeg,jpg|required|required_without:id',
            'status'        => 'required|in:active,inactive',
           */

      //  ]);
        
            if($request->post('id')>0){

             $request->validate([

            'cats_name'     => 'required',
            'cats_slug'     => 'required|unique:categories,cats_slug,'   .$request->post('id'),
            'cats_image'    => 'mimes:png,jpeg,jpg',
            'status'        => 'required|in:active,inactive',
           

        ]);
        
                
                $data = Category::find($request->post('id'));
                $msg = "data has been updated succesfully";


            }else{
                 $request->validate([

            'cats_name'     => 'required',
            'cats_slug'     => 'required|unique:categories',
            'cats_image'    => 'mimes:png,jpeg,jpg|required',
            'status'        => 'required|in:active,inactive',
           

        ]);
        
                   $data = new Category;
                   $msg  = "Data has been inserted succesfully";


            }
      
                 $data->cats_name  = $request->post('cats_name');
                 $data->cats_slug  = $request->post('cats_slug');
                 $data->status     = $request->post('status');

                if($request->hasfile('cats_image')){
                    $imagepath = public_path('images/category/'.$data->cats_image);
                    ($imagepath);

                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }
                    
                    
                $file          = $request->file('cats_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext; 
                //Image::make($file)->resize(800,400)->save($file_name);               
                $request->file('cats_image')->move('images/category', $file_name);
                         
                 $data->cats_image = $file_name;
         }             
              $data->save();

                if($data){
                $request->session()->flash('success', $msg);
                return redirect('admin/category/list_category');

             }else{
                $request->session()->flash('error', 'error uploading category');
                return redirect('admin/category/list_category');


         }

    }

                 public function delete(Request $request, $id){

       
                    $data = Category::find($id);
                    $imagepath = public_path('images/category/'.$data->cats_image);

                    //dd($imagepath);

                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }
                 $success = $data->delete();
                 if($success){
            $request->session()->flash('success', 'category has been deleted');
            return redirect('admin/category/list_category');

         }else{
            $request->session()->flash('error', 'error deleting data');
            return redirect('admin/category/list_category');

        }
    
       
    }


    
}
