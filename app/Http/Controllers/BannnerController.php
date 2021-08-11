<?php

namespace App\Http\Controllers;

use App\Models\Bannner;
use Illuminate\Http\Request;
use File;
use Image;
use DB;
use Session;


class BannnerController extends Controller
{
 public function list_banner()
    {

        $data['result'] = Bannner::orderBy('updated_at','DESC')->paginate(5);

       return view('admin.banner.list_banner',$data);
    }

     public function add_banner(Request $request, $id=''){

         if($id>0){
            $match = Bannner::where('id', $id)->exists();  
            /* dd($id);
             die;  */      
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
           
                 $arr = Bannner::where(['id'=> $id])->get();                 

                $data['bans_name']        =  $arr['0']->bans_name;
                $data['bans_link']        =  $arr['0']->bans_link;
                $data['bans_image']       =  $arr['0']->bans_image;
                $data['bans_status']      =  $arr['0']->bans_status;  
                $data['id']               =   $arr['0']->id;
                
                                  
            return view('admin.banner.add_banner',$data);

            }           
           
            else{
                  $data['bans_name']        =   '';
                  $data['bans_link']        =   '';
                  $data['bans_image']       =   '';
                  $data['bans_status']      =   '';
                  $data['id']          =   0;                       
                return view('admin.banner.add_banner',$data);
            }    
           

    }
             public function submit(Request $request){

                 $email = session::get('email');

                // dd($email);

       
            if($request->post('id')>0){

             $request->validate([

            'bans_name'          => 'required',
            'bans_link'          => 'nullable',
            'bans_image'         => 'mimes:png,jpeg,jpg',
            'bans_status'        => 'required|in:active,inactive',
           

        ]);
        
                
                $data = Bannner::find($request->post('id'));
                $msg = "data has been updated succesfully";


            }else{
                 $request->validate([

            'bans_name'          => 'required',
            'bans_link'          => 'nullable|',
            'bans_image'         => 'mimes:png,jpeg,jpg|required',
            'bans_status'        => 'required|in:active,inactive',
           

        ]);
        
                   $data = new Bannner;
                   $msg  = "Data has been inserted succesfully";


            }
      
                 $data->bans_name       = $request->post('bans_name');
                 $data->bans_link       = $request->post('bans_link');
                 $data->bans_status     = $request->post('bans_status');
                 $data->added_by        = $email;
                

                if($request->hasfile('bans_image')){
                    $imagepath = public_path('images/banner/'.$data->bans_image);
                    ($imagepath);

                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }
                    
                    
                $file          = $request->file('bans_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext; 
                //Image::make($file)->resize(800,400)->save($file_name);               
                $request->file('bans_image')->move('images/banner', $file_name);
            
                         
                 $data->bans_image = $file_name;
         }             
                    $data->save();

                if($data){
                $request->session()->flash('success', $msg);
                return redirect('admin/banner/list_banner');

             }else{
                $request->session()->flash('error', 'error uploading banner');
                 return redirect('admin/banner/list_banner');
         }
    }

                 public function delete(Request $request, $id){

       
                    $data = Bannner::find($id);
                    $imagepath = public_path('images/banner/'.$data->cats_image);

                    //dd($imagepath);

                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }
                 $success = $data->delete();
                 if($success){
                    $request->session()->flash('success', 'banner has been deleted');
                    return redirect('admin/banner/list_banner');

                 }else{
                    $request->session()->flash('error', 'error deleting data');
                    return redirect('admin/banner/list_banner');

        }
    
       
    }



    public function gallery(){

       // dd('gallery section');

      $gallery = DB::table('bannners')->select('bans_image','bans_name')->
        
            where('bans_status','active')->get();
           // dd($gallery);  

            return view('frontend.gallery.gallery',['photo'=>$gallery]);




    }


}
