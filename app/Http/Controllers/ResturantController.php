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

     public function add_resturant(){
          return view('admin.resturant.add_resturant');
      }  
             
     public function submit(Request $request){

                   $email = session::get('email');
                   $id = session::get('id');


                   $validate = $this->Validate($request,[


            'rest_name'        =>  'required',
            'rest_address'     =>  'required|',
            'rest_email'       =>  'required|unique:resturants,rest_email',
            'rest_phone'       =>  'required',
            'rest_otime'       =>  'required',
            'rest_ctime'       =>  'required',
            'rest_image'       =>  'required|mimes:png,jpeg,jpg',
            'rest_status'      =>  'required|in:active,inactive',

                       ]);

                   try{
                    DB::beginTransaction();
                     if($request->hasfile('rest_image')){
                    /*$imagepath = public_path('images/resturant/'.$data->rest_image);
                    ($imagepath);
                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);                    
                }
                    }*/
                             
                    $file          = $request->file('rest_image');                
                    $ext           = $file->getClientOriginalExtension(); 
                    $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;              
                    $request->file('rest_image')->move('images/resturant', $file_name);
                }
                             
                    $data = [
                'rest_name'             => $request->rest_name,
                'rest_address'          => $request->rest_address,
                'rest_email'            => $request->rest_email,
                'rest_phone'            => $request->rest_phone,
                'rest_otime'            => $request->rest_otime,
                'rest_ctime'            => $request->rest_ctime,
                'rest_status'           => $request->rest_status,
                'rest_image'            =>$file_name,
                'added_by'              =>  $id,       

                    ];

                     $insert = Resturant::create($data);
                     if($insert){
                        DB::commit();
                         $request->session()->flash('success', "data has been added succesfully");
                        return redirect('admin/resturant/list_resturant');
                     }



                   }catch(Exception $e ){
                    DB::rollback();
                    $request->session()->flash('error', $e->getMessage());
                        return redirect('admin/resturant/add_resturant');
                   }
    }
                public function edit_resturant($id){

                    $findId = Resturant::find($id);
                   if(!$findId){

                   request()->session()->flash('error', "invalid key");
                    return redirect('admin/resturant/list_resturant');

                   }
                    $edit_info = Resturant::where('id',$id)->first();
                   
                    $data = [

                    'id'        => $id,
                    'edit_info' =>$edit_info

                    ];
                 return view('admin.resturant.edit_resturant',$data);
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

        public function update(Request $request){
                $id = session::get('id');
            
            $validate = $this->Validate($request, [

            'rest_name'         =>  'required|min:3|max:20',
            'rest_address'      =>  'required|min:5|max:30',
            'rest_email'        =>  'required|email|unique:resturants,rest_email,'.$request->post('id'),
            'rest_phone'        =>  'required|numeric|min:4',
            'rest_otime'        =>  'required',
            'rest_ctime'        =>  'required',
            'rest_image'        =>  'mimes:png,jpeg,jpg',  
            'rest_status'       =>  'required|in:active,inactive',

        ]);
            $findData = Resturant::find($request->id);

             try{
                    DB::beginTransaction();
                     if($request->hasfile('rest_image')){
                    /*$imagepath = public_path('images/resturant/'.$data->rest_image);
                    ($imagepath);
                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);                    
                }
                    }*/
                             
                    $file          = $request->file('rest_image');                
                    $ext           = $file->getClientOriginalExtension(); 
                    $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;              
                    $request->file('rest_image')->move('images/resturant', $file_name);
                    $findData->rest_image            = $file_name;
                }
                             
                   
                $findData->rest_name             = $request->rest_name;
               $findData->rest_address           = $request->rest_address;
                $findData->rest_email            = $request->rest_email;
                $findData->rest_phone            = $request->rest_phone;
                $findData->rest_otime            = $request->rest_otime;
                $findData->rest_ctime            = $request->rest_ctime;
                $findData->rest_status           = $request->rest_status;
                $findData->updated_by            =  $id;       

                   

                     $update =$findData->save();
                     if($update){
                        DB::commit();
                         $request->session()->flash('success', "data has been updated succesfully");
                        return redirect('admin/resturant/list_resturant');
                     }



                   }catch(Exception $e ){
                    DB::rollback();
                    $request->session()->flash('error', $e->getMessage());
                        return redirect('admin/resturant/add_resturant');
                   }
        }


    public function search(Request $request){

      $view =  $request->Search;

      if($view!= ''){
        $mysearch = Resturant::where('rest_name', 'LIKE', '%'. $view .'%')
        ->where('rest_status','active')->get();

       return view('frontend.search.search',['searches'=>$mysearch]);


      }else{

         //dd(' empty');

       return redirect()->back();
      }


    }

}
