<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Session;
use DB;


class OrderController extends Controller
{
    
    public function orderlist(){

        $id = Session::get('id');
        $email = Session::get('email');
        //dd($email);

        $phone_number = DB::table('users')->where('id',$id)->first();
      // dd($phone_number);

        $cart = DB::table('carts')->select('food_name','quantity','total_price')
      ->where('user_id',$id)
        ->where('user_email',$email)->get();
     //   dd($cart);
        $grandtotal = DB::table('grand_totals')->select('all_total')
         ->where('user_id',$id)
        ->where('email',$email)->get();
        //dd( $grandtotal);


        $data = User::where('id',$id)
        ->where('email',$email)
        ->where('phone',$phone_number->phone)->get();
       // dd($data);
       //


      
       return view('frontend.order.checkout',['results'=>$data,'cart'=>$cart,'grandtotal'=>$grandtotal]);

    }


    public function submit(Request $request){

       // dd($request->post());
        //dd($request->post());

       $validate = $this->validate($request,[

            'name'        => 'required|max:20|min:3|string',
            'email'       => 'required|max:50|min:3|string|email',
            'phone'       => 'required|numeric|min:3',
            'address'     => 'required|max:50|min:10|string',
            'instruct'    => 'nullable',
          //  'pay'         =>'required|in:cashondelivery,esewa,fonepay'


        ]);

        $id = Session::get('id');
        $email = Session::get('email');


        $cart = DB::table('carts')->select('food_name','quantity','total_price','food_price')
      ->where('user_id',$id)
        ->where('user_email',$email)->get();

      // $subtract = $cart->food_price - 100;

        $grandtotal = DB::table('grand_totals')->select('all_total')
        ->where('user_id',$id)
        ->where('email',$email)
        ->get();

       // dd($cart);

        $userdata = $request->post();

        //dd($userdata['name']);

    return view('frontend.order.place_order',['cart'=>$cart,'userdatas'=> $userdata,'grandtotal'=> $grandtotal ]);
   

    }


    public function placeorder(Request $request){

        //dd($request->post());

        $id = Session::get('id');
        $email = Session::get('email');


       // dd('yes');

        //dd($request->post());
 

        $cart = DB::table('carts')
         ->where('user_id',$id)
        ->where('user_email',$email)->get();

        $rest_id   = $cart['0']->rest_id;
        $rest_name = $cart['0']->res_name;

 
        // fetching each data

        $product  = DB::table('carts')->select('food_name')
         ->where('user_id',$id)
        ->where('user_email',$email)->get();

      
        $foodname = $product->pluck('food_name');
       // dd($usernames);

         $quantity  = DB::table('carts')->select('quantity')
         ->where('user_id',$id)
        ->where('user_email',$email)->get();

          $quantities = $quantity->pluck('quantity');



           $sub_total  = DB::table('carts')->select('food_price')
         ->where('user_id',$id)
        ->where('user_email',$email)->get();

         $subtotals = $sub_total->pluck('food_price');

         $grandtotal = DB::table('grand_totals')->select('all_total')
        ->where('user_id',$id)
        ->where('email',$email)
        ->first();
       // dd($grandtotal);

        if($grandtotal->all_total <'500'){

          $request->session()->flash('error','Order Price should be greater than 500');

          return redirect('index/checkout');


        }

        $rand = rand(10000,9999999);
     

        $order = new Order;

        $order->order_id              = $rand;
        $order->rest_id               =    $rest_id;
        $order->rest_name             =   $rest_name;
        $order->order_items           =   $foodname;//serialize($cart); 
        $order->quantity              =    $quantities;
        $order->sub_total             =  $subtotals;
        $order->user_id               = $id;
        $order->user_name             = $request->name;
        $order->email                 = $request->email;
        $order->phone                 = $request->phone;
        $order->user_address          = $request->address;
        $order->all_total             = $grandtotal->all_total;
        $order->payment_mode          = $request->pay;
       // $order->status                = 'cooking';


       $true =  $order->save();



       // delete the cart after placing an order

       $delete = DB::table('carts')

        ->where('user_id',$id)
        ->where('user_email',$email)->delete();

        $delete1 = DB::table('grand_totals')

        ->where('user_id',$id)
        ->where('email',$email)->delete();


       // end of delete the cart after placing an order


       $request->session()->flash('order',$rand);
        return redirect('index/checkout/confirm');
       
    }


    public function thankyou(){

        return view('frontend.order.thankyou1');
       

    }


    public function myorder(){

     
       
        $id = Session::get('id');
        $email = Session::get('email');

     

       // end fetching data 

      $all  = DB::table('carts')->select('food_name','quantity', 'food_price')
         ->where('user_id',$id)
        ->where('user_email',$email)->get();




        $orders = DB::table('orders')/*->select('order_items')*/
       -> orderBy('updated_at','DESC')
         ->where('user_id',$id)->paginate(5);

   
         $orders1= DB::table('orders')/*->select('order_items')*/
         ->where('user_id',$id)->count();


     return view('frontend.users.user_order_list',['data'=> $orders]/*['order'=>$orders,'alls'=>$all ]*/);


  
    }

    
}
