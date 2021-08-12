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

             public function add_banner(){
                 return view('admin.banner.add_banner');
             }

             public function submit(Request $request){
                 $id = session::get('id');
               
                 $validate = $this->Validate($request,[
                        'bans_name'          => 'required',
                        'bans_link'          => 'nullable|',
                        'bans_image'         => 'mimes:png,jpeg,jpg|required',
                        'bans_status'        => 'required|in:active,inactive',


                 ]);
                   //dd($request->all());
                 try{
                    DB::beginTransaction();
                     if($request->hasfile('bans_image')){
                    /*$imagepath = public_path('images/banner/'.$data->bans_image);
                    ($imagepath);      
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);       
                }
                    }*/
                       
                $file          = $request->file('bans_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;         
                $request->file('bans_image')->move('images/banner', $file_name);
            }
                $data = [
                 'bans_name'       => $request->bans_name,
                 'bans_link'       => $request->bans_link,
                 'bans_status'     => $request->bans_status,
                 'bans_image'       => $file_name,
                 'added_by'        => $id,

                ];       
                $insert = Bannner::create($data);
                if($insert){
                    DB::commit();
                 $request->session()->flash('success', "Banner has been created");
                return redirect('admin/banner/list_banner');

                }

                 }catch(Exception $e){
                    DB::rollback();
                $request->session()->flash('error', $e->getMessage());
                return redirect('admin/banner/add_banner');

                 }
             }

             public function edit_banner($id){
              $findId = Bannner::find($id);
                   if(!$findId){
                   request()->session()->flash('error', "invalid key");
                    return redirect('admin/banner/list_banner');
                   }
             

              $findInfo = Bannner::where('id',$id)->first();

              $data = [
                'findInfo' => $findInfo,
                 'id'      => $id,
              ];
             return view('admin.banner.edit_banner',$data);
             }

             public function update(Request $request){
                  $id = session::get('id');
                $validate = $this->Validate($request,[
                    'bans_name'          => 'required',
                    'bans_link'          => 'nullable',
                    'bans_image'         => 'mimes:png,jpeg,jpg',
                    'bans_status'        => 'required|in:active,inactive',


                ]);

                try{
                    DB::beginTransaction();
                    $findId = Bannner::find($request->id);
                      if($request->hasfile('bans_image')){
                    /*$imagepath = public_path('images/banner/'.$data->bans_image);
                    ($imagepath);

                   
                     if($request->post('id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }*/
                    
                    
                $file          = $request->file('bans_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;        
                $request->file('bans_image')->move('images/banner', $file_name);            
                 $findId->bans_image = $file_name;
         }   


                 $findId->bans_name       = $request->bans_name;
                 $findId->bans_link       = $request->bans_link;
                 $findId->bans_status     = $request->bans_status;
                 $findId->updated_by        = $id;

                 $update = $findId->save();
                 if($update){
                    DB::commit();
                     $request->session()->flash('success', "Banner has been Updated");
                return redirect('admin/banner/list_banner');

                 }

                }catch(Exception $e){
                    DB::rollback();
                $request->session()->flash('error', $e->getMessage());
                return redirect('admin/banner/add_banner');
                }

             }

                 public function delete(Request $request, $id){
                    $data = Bannner::find($id);
                    $imagepath = public_path('images/banner/'.$data->cats_image);

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
