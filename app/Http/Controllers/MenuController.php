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

        $data['result'] = Menu::orderBy('updated_at','DESC')->paginate('5');

       return view('admin.menu.list_menu',$data);
    }

            public function add_menu(Request $request, $menu_id=''){

                $menu['rest'] = Resturant::select('rest_name','id')->get();

                /*dd($menu['rest']);
                die;*/

                 if($menu_id>0){
                    $match = Menu::where('menu_id', $menu_id)->exists();  
                    /* dd($id);
                     die;  */      
                    if( $match != $menu_id)
                       {
                       
                        $request->session()->flash('error', 'Invalid key');
                         return redirect('admin/dashboard');
                        }
                   
                         $arr = Menu::where(['menu_id'=> $menu_id])->get();                 

                        $data['menu_name']         =  $arr['0']->menu_name;
                        $data['menu_price']        =  $arr['0']->menu_price; 
                        $data['rests_id']          =  $arr['0']->rests_id;               
                        $data['menu_status']       =  $arr['0']->menu_status;  
                       $data['menu_image']         =   $arr['0']->menu_image;
                        $data['menu_id']           =   $arr['0']->menu_id;
                        $data['ingredients']       =   $arr['0']->ingredients;
                        $data['direction']         =   $arr['0']->direction;
                                          
                         return view('admin.menu.add_menu',$data , $menu);

                }           
               
                else{
                      $data['menu_name']         =     '';
                      $data['menu_price']        =     '';
                      $data['menu_status']       =     '';
                      $data['rests_id']          =     '';
                      $data['menu_image']        =      '';
                      $data['menu_id']           =      0;     
                      $data['ingredients']       =      '';
                      $data['direction']         =      '';               
                    return view('admin.menu.add_menu',$data, $menu);
                }               
    }
             public function submit(Request $request){   

                $email = session::get('email');

              // dd($request->menu_name);


                
                   if($request->post('id')>0){



             $request->validate([

            'menu_name'     => 'required',
            'menu_price'    => 'required',
            'menu_image'    => 'mimes:png,jpeg,jpg',
            'rests_id'      =>  'required',
            'menu_status'   => 'required|in:active,inactive',
            'ingredients'   => 'string|required|min:10',
            'direction'   => 'string|required|min:10',
           

        ]);

                  $data = Menu::find($request->post('id'));
                  $msg = "data has been updated succesfully";


                  //dd($request->menu_name);

                  }
                  else
                  {

                    //return $request->post();
                 $request->validate([

            'menu_name'         =>  ' required',
            'menu_price'        =>   ' required' ,
            'menu_image'        =>   'mimes:png,jpeg,jpg|required',
            'rests_id'          =>  'required',
            'menu_status'       => 'required|in:active,inactive',
            'ingredients'       => 'string|required|min:10',
            'direction'         => 'string|required|min:10',

           

        ]);
                     //   dd( $request->post());


                    $data = new Menu;                 
                   $msg  = "Data has been inserted succesfully";
         
               }   
                 $data->menu_name       =   $request->post('menu_name');
                 $data->menu_price      =   $request->post('menu_price');
                 $data->rests_id        =    $request->post('rests_id');
                 $data->menu_status     =   $request->post('menu_status');
             
                 $data->ingredients     =   $request->post('ingredients');
                 $data->direction       =   $request->post('direction');

                 $data->added_by        =      $email;           
                 
            // for strong image and deleting if new image come
                    if($request->hasfile('menu_image')){
                    $imagepath = public_path('images/menu/'.$data->menu_image);
                    ($imagepath);

                   
                     if($request->post('menu_id')>0){
                    if(File::exists($imagepath)){
                        unlink($imagepath);
                    
                }
                    }
                    
                    
                $file          = $request->file('menu_image');                
                $ext           = $file->getClientOriginalExtension(); 
                $file_name     = "img-".date('H-m-d-h-i-s').".".$ext; 
                //Image::make($file)->resize(800,400)->save($file_name);               
                $request->file('menu_image')->move('images/menu', $file_name);
                         
                 $data->menu_image = $file_name;
            }
                $data->save();
                
                      // dd()            
     

                    if($data){
                    $request->session()->flash('success', $msg);
                    return redirect('admin/menu/list_menu');

                   }else{
                    $request->session()->flash('error', 'error uploading menu');
                    return redirect('admin/menu/list_menu');
             

    }
}
                 public function delete(Request $request, $menu_id){
      
                        $data = Menu::find($menu_id);
                       // dd($data);
                        $imagepath = public_path('images/menu/'.$data->menu_image);

                    //dd($imagepath);

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

       // return('hello');
        //dd($product_id);

        $banner = DB::table('bannners')->select('bans_image')
        ->where('bans_status','active')->inRandomOrder()->limit(5)->get();

      //  dd($banner);

        $product_info = DB::table('menus')->select('menu_image','menu_name','ingredients','direction')
        ->where('menu_id',$product_id)
        ->get();
       // dd($product_info);

        return view('admin.menu.blog',['data'=>$product_info,'banner'=>$banner]);



    }
    


}
