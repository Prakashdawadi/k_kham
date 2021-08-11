<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function list_coupon()
    {

        $data['result'] = Coupon::orderBy('updated_at','DESC')->get();

       return view('admin.coupon.list_coupon',$data);
    }

     public function add_coupon(Request $request, $id=''){

         if($id>0){
            $match = Coupon::where('id', $id)->exists();  
            /* dd($id);
             die;  */      
            if( $match != $id)
               {
               
                $request->session()->flash('error', 'Invalid key');
                 return redirect('admin/dashboard');
                }
           
                 $arr = Coupon::where(['id'=> $id])->get();                 

                $data['coupons_name']      =  $arr['0']->coupons_name;
                $data['coupons_code']      =  $arr['0']->coupons_code;
                $data['coupons_value']     =  $arr['0']->coupons_value;
                $data['coupons_status']    =  $arr['0']->coupons_status;  
                $data['id']                =   $arr['0']->id;
                                  
                return view('admin.coupon.add_coupon',$data);

                }           
               
                else{
                      $data['coupons_name']        =   '';
                      $data['coupons_code']        =   '';
                      $data['coupons_value']       =   '';
                      $data['coupons_status']      =   '';
                      $data['id']                   =   0;                       
                    return view('admin.coupon.add_coupon',$data);
                }               
    }
             public function submit(Request $request){   
                
                    //return $request->post();

                    if($request->post('id')>0){

                     $request->validate([

                    'coupons_name'            => 'required',
                    'coupons_code'            => 'required|unique:coupons,coupons_code,' .$request->post('id'),
                    'coupons_value'           => 'required',
                    'coupons_status'          => 'required|in:active,inactive',         

                ]);
  
                $data = Coupon::find($request->post('id'));
                $msg = "data has been updated succesfully";

            }else{
                $request->validate([

                    'coupons_name'            => 'required',
                    'coupons_code'            => 'required|unique:coupons',
                    'coupons_value'           => 'required',
                    'coupons_status'          => 'required|in:active,inactive',         

                ]);
  
                        
                   $data = new Coupon;
                   $msg  = "Data has been inserted succesfully";
            }      
                 $data->coupons_name      = $request->post('coupons_name');
                 $data->coupons_code      = $request->post('coupons_code');
                 $data->coupons_value     = $request->post('coupons_value');
                 $data->coupons_status    = $request->post('coupons_status');
                  $data->save();
                    
                
                    
                      // dd()            
                     
             

                if($data){
                $request->session()->flash('success', $msg);
                return redirect('admin/coupon/list_coupon');

               }else{
                $request->session()->flash('error', 'error uploading coupon');
                return redirect('admin/coupon/list_coupon');
         

    }
}
                 public function delete(Request $request, $id){
      
                    $data = Coupon::find($id);                    
                         $success = $data->delete();

                         if($success){
                    $request->session()->flash('success', 'coupon has been deleted');
                    return redirect('admin/coupon/list_coupon');

                 }else{
                    $request->session()->flash('error', 'error deleting data');
                    return redirect('admin/coupon/list_category');

        
    
       
    }
}

}
