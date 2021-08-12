<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use App\Models\Resturant;
use Illuminate\Http\Request;
use file;
use Session;

class MenuController extends Controller
{
     public function list_menu()
    {

        $data['result'] = Menu::with('resturantName')
                        ->orderBy('updated_at','DESC')->paginate('5');
       

       return view('admin.menu.list_menu',$data);
    }

            public function add_menu(){

                 $menu['rest'] = Resturant::select('rest_name','id')
                                ->where('rest_status','active')
                                ->get();

                   return view('admin.menu.add_menu',$menu);

               }

             public function submit(Request $request){   


                $email = session::get('email');
                $id     = session::get('id');
                $valdate = $this->Validate($request , [
                    'menu_name'         =>  ' required',
                    'menu_price'        =>   ' required' ,
                    'menu_image'        =>   'mimes:png,jpeg,jpg|required',
                    'rests_id'          =>  'required',
                    'menu_status'       => 'required|in:active,inactive',
                    'ingredients'       => 'string|required|min:10',
                    'direction'         => 'string|required|min:10',

                ]);

                try{
                    DB::beginTransaction();


                    if($request->hasfile('menu_image')){
                    /*$imagepath = public_path('images/menu/'.$data->menu_image);
                    ($imagepath);
                     if($request->post('menu_id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }*/
                    
                    
                $file          = $request->file('menu_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;     
                $request->file('menu_image')->move('images/menu', $file_name);
            }

                $data = [

                 'menu_name'      =>   $request->menu_name,
                 'rests_id'       =>   $request->rests_id,
                 'menu_price'     =>   $request->menu_price,
                 'rests_id'       =>    $request->rests_id,
                 'menu_status'    =>   $request->menu_status,
                 'menu_image'     =>  $file_name,
             
                 'ingredients'    =>   $request->ingredients,
                 'direction'      =>   $request->direction,

                 'added_by'       =>    $id  


                ];
                $insert = Menu::create($data);
                if($insert){
                    DB::commit();
                     $request->session()->flash('success', "menu has been added succesfully");
                    return redirect('admin/menu/list_menu');

                }


                }catch(Exception $e){
                    DB::rollback();
                     $request->session()->flash('error', $e->getMessage());
                    return redirect('admin/menu/add_menu');
                }


            }

                public function edit_menu($id){
                   $findId = Menu::find($id);
                   if(!$findId){

                   request()->session()->flash('error', "invalid key");
                    return redirect('admin/menu/list_menu');

                   }

                   $findInfo = Menu::where('id',$id)->first();


                   $resturantInfo = Resturant::select('rest_name','id')
                                ->where('rest_status','active')
                                ->get();

                   $data = [
                    'findInfo'  => $findInfo,
                    'id'        => $id,
                    'resturantInfo' => $resturantInfo
                   ];

                    return view('admin.menu.edit_menu',$data);

                }
                public function update(Request $request){
                    $id = session::get('id');
            
                $validate = $this->Validate($request, [

                 'menu_name'         =>   ' required',
                'menu_price'         =>   ' required' ,
                'menu_image'         =>   'nullable|mimes:png,jpeg,jpg',
                'menu_status'        =>   'required|in:active,inactive',
                'ingredients'        =>   'string|required|min:10',
                'direction'          =>   'string|required|min:10',
 
        ]);
                try{
                    DB::beginTransaction();
                     $findData = menu::find($request->id);
                     if($request->hasfile('menu_image')){
                    /*$imagepath = public_path('images/menu/'.$data->menu_image);
                    ($imagepath);
                     if($request->post('menu_id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);     
                }
                    }*/
                    
                    
                $file          = $request->file('menu_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext;     
                $request->file('menu_image')->move('images/menu', $file_name);
                $findData->menu_image = $file_name;
            }

              
                 $findData->menu_name      =   $request->menu_name;
                 $findData->rests_id       =   $request->rests_id;
                 $findData->menu_price     =   $request->menu_price;
                  $findData->rests_id      =   $request->rests_id;
                 $findData->menu_status    =   $request->menu_status;
                 $findData->ingredients    =   $request->ingredients;
                 $findData->direction      =   $request->direction;
                 $updated_by                =    $id;
              
                $update = $findData->save();
                if($update){
                    DB::commit();
                     $request->session()->flash('success', "menu has been updated succesfully");
                    return redirect('admin/menu/list_menu');
                }

                }catch(Exception $e){
                    DB::rollback();
                     $request->session()->flash('error', $e->getMessage());
                    return redirect('admin/menu/list_menu');

                }

                }

                 public function delete(Request $request, $menu_id){
      
                        $data = Menu::find($menu_id);
                        $imagepath = public_path('images/menu/'.$data->menu_image);

                     if($request->post('menu_id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }                   
                         $success = $data->delete();

                                 if($success){
                            $request->session()->flash('success', 'menu has been deleted');
                            return redirect('admin/menu/list_menu');

                         }else{
                            $request->session()->flash('error', 'error deleting data');
                            return redirect('admin/menu/list_menu');
       
    }
}
    
    public function viewproduct($product_id){

       
        $banner = DB::table('bannners')->select('bans_image')
        ->where('bans_status','active')->inRandomOrder()->limit(5)->get();

        $product_info = Menu::select('menu_image','menu_name','ingredients','direction')
        ->where('id',$product_id)
        ->get();
       

        return view('admin.menu.blog',['data'=>$product_info,'banner'=>$banner]);



    }
    


}
