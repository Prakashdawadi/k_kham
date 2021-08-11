<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\view;
//use App\Models\Resturant;

use App\Models\Cart;

use App\Models\GrandTotal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Auth;
use DB;

class CartController extends Controller
{
    public function menu(Request $request){
        

        if(Session::has('USER_LOGIN'))
        {
            //$cart = new Cart;


         $data = DB::table('menus')
        ->where('menu_id', $request->product_id)->get(); // this one to get resturant id from product id

        $data1 = DB::table('menus')
        ->where('menu_id', $request->product_id)->first(); // this one is to store menu information


            // to check cart items is null or not
            $countItem = DB::table('carts')->count();
            //dd( $countItem);

       if($countItem!=null){



        $data2 = DB::table('menus')->select('rests_id')  ->where('menu_id', $request->product_id)->first();
       // dd($data2->rests_id);

        $data23 = DB::table('carts')->select('user_email')->where('user_email', session('email'))->first();
        //dd($data23);

        if($data23!=null){
        $data3 = DB::table('carts')->select('rest_id')->where('user_email', session('email'))->first();

        //dd($data3->rest_id);

        // to whether the prevoius hotel id is same or not if not then delete
        if($data2->rests_id != $data3->rest_id){

            $user = Cart::where('user_email', session('email'));
            $user->delete();
            if($user->delete()){
                //dd('successfully deleted');
            }
            
           }
       
}
}




         foreach($data as $obj)  //warning generated here
             {
            $rest_id  =  ($obj->rests_id);
          
             }
    

        $resturantname = DB::table('resturants')->where('id', $rest_id)->first();

                $cart = DB::table('carts')->select('user_email')->where('user_email',session('email'))->first(); // check whether the user has cart or not
                //dd($cart);



                if($cart){
                    // if yes have the same cart
                    //dd('already');

                    $cart1 = DB::table('carts')->where('food_id',$request->product_id)
                    ->where('user_email',session('email'))->first();

                    //dd($cart1);


                    if($cart1){                       
                       // dd('same product again in same session');

                        $cart2 = DB::table('carts')->select('quantity','food_price')->where('food_id',$request->product_id)
                    ->where('user_email',session('email'))->first();
                    //dd($cart2->quantity);

                    $quantity = $cart2->quantity;
                    $unitprice = $cart2->food_price;
                    //dd($unitprice);

                    $cart3 = DB::table('carts')->where('food_id',$request->product_id)
                    ->where('user_email',session('email'))
                    ->update([ 'quantity' =>  $quantity+1,'total_price' => ($quantity+1)*$unitprice]);





                        // update grandtotal


        $userId = session::get('id');
         $email = session::get('email');
        // dd($email);

        $useIDTotal = DB::table('carts')//->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->count() ;


        $Total1 = DB::table('carts')->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->get() ;

        $total = 0;

        for($i=$useIDTotal;$i<=$useIDTotal;$i++){

            foreach($Total1 as $obj){

                $total += $obj->total_price;


            }


        }


        //dd($total);


        $cart = DB::table('grand_totals')->select('user_id','email')

            ->where('user_id',$userId)
            ->where('email', $email)->first();

           if($cart){
            // user has previous total
            //dd('update');

            $updateTotal = DB::table('grand_totals')
            ->where('user_id',$cart->user_id)
            ->where('email', $cart->email)
            ->update(['all_total' =>$total+100]);

           // dd('grand total updated');



           }else{
            // user doesnot has total or userhas not cart yet
           // dd('new');




      $all_total = new  GrandTotal;
      
      $all_total->user_id     =     $userId;
      $all_total->email       =     $email;   
      $all_total->all_total   =     $total;

       $success = $all_total->save();



           }
   


                    // endgrand total



                    return json_encode('same product has been added successfully');
                    //dd($cart3);
                      

                    }else{

                        //dd('different product in same session');

                        $session_id = Session::get('session_id');
                  if(empty($session_id)){
                    $session_id = Session::getId();
                    Session::put('session_id',$session_id);
                }

                 $cart4 = new Cart;

                $cart4->food_id           =       $data1->menu_id;
                $cart4->food_name         =      $data1->menu_name;
                $cart4->res_name          =       $resturantname->rest_name ;
            
                 $cart4->quantity         =        1;
                 $cart4->food_price       =       $data1->menu_price; 
                $cart4->total_price       =      $cart4->food_price * $cart4->quantity;
                 $cart4->session_id       =       $session_id;   
                  $cart4->user_id         =        session('id');
                 $cart4->user_email       =       session('email');                         
                 $cart4->rest_id          =       $data1->rests_id; 
              
                 $cart4->save();




                        // update grandtotal


        $userId = session::get('id');
         $email = session::get('email');
        // dd($email);

        $useIDTotal = DB::table('carts')//->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->count() ;


        $Total1 = DB::table('carts')->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->get() ;

        $total = 0;

        for($i=$useIDTotal;$i<=$useIDTotal;$i++){

            foreach($Total1 as $obj){

                $total += $obj->total_price;


            }


        }


        //dd($total);


        $cart = DB::table('grand_totals')->select('user_id','email')

            ->where('user_id',$userId)
            ->where('email', $email)->first();

           if($cart){
            // user has previous total
            //dd('update');

            $updateTotal = DB::table('grand_totals')
            ->where('user_id',$cart->user_id)
            ->where('email', $cart->email)
            ->update(['all_total' =>$total+100]);

            //dd('grand total updated');



           }else{
            // user doesnot has total or userhas not cart yet
           // dd('new');




      $all_total = new  GrandTotal;
      
      $all_total->user_id     =     $userId;
      $all_total->email       =     $email;   
      $all_total->all_total   =     $total+100;

       $success = $all_total->save();



           }

                    // endgrand total


                    return json_encode('New Items Added');

             // return json_encode(['status'=>'Add to cart successfully','totalitems'=>Cart::itemsInCart()]);


                    }

                }else{
                    // if not the same cart
                    //dd('first time');
                    $session_id = Session::get('session_id');
                  if(empty($session_id)){
                    $session_id = Session::getId();
                    Session::put('session_id',$session_id);
                }

                 $cart = new Cart;

                $cart->food_id           =       $data1->menu_id;
                $cart->food_name         =      $data1->menu_name;
                $cart->res_name          =       $resturantname->rest_name ;
            
                 $cart->quantity         =        1;
                 $cart->food_price       =       $data1->menu_price; 
                $cart->total_price      =      $cart->food_price * $cart->quantity;
                 $cart->session_id       =       $session_id;   
                  $cart->user_id         =        session('id');
                 $cart->user_email       =       session('email');                         
                 $cart->rest_id          =       $data1->rests_id; 
              
                 $cart->save();



                        // update grandtotal


         $userId = session::get('id');
         $email = session::get('email');
        // dd($email);

        $useIDTotal = DB::table('carts')//->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->count() ;


        $Total1 = DB::table('carts')->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->get() ;

        $total = 0;

        for($i=$useIDTotal;$i<=$useIDTotal;$i++){

            foreach($Total1 as $obj){

                $total += $obj->total_price;


            }


        }


        //dd($total);


        $cart = DB::table('grand_totals')->select('user_id','email')

            ->where('user_id',$userId)
            ->where('email', $email)->first();

           if($cart){
            // user has previous total
            //dd('update');

            $updateTotal = DB::table('grand_totals')
            ->where('user_id',$cart->user_id)
            ->where('email', $cart->email)
            ->update(['all_total' =>$total+100]);

            //dd('grand total updated');



           }else{
            // user doesnot has total or userhas not cart yet
           // dd('new');




      $all_total = new  GrandTotal;
      
      $all_total->user_id     =     $userId;
      $all_total->email       =     $email;   
      $all_total->all_total   =     $total;

       $success = $all_total->save();



           }


                 // endgrand total





        
             return json_encode('Add to cart successfully');

            // return json_encode(['status'=>'Add to cart successfully','totalitems'=>Cart::itemsInCart()]);




                }







        }else{
            // if the user is not login

         
            return json_encode("please login to add to cart");


        }

           
}


     static function itemsInCart(){

       $userId = session::get('id');

        return DB::table('carts')->where('user_id',$userId)->count('quantity');
    }



/*
    public function myCart(){

      return view ('frontend.bag.bag_list');




    }*/


    public function showCart(Request $request){

        $userId = session::get('id');
        $email = session::get('email');

       $cart = DB::table('carts')->where('user_id',$userId)->get();
       $carts= DB::table('grand_totals')
       ->where('user_id',$userId)
       ->get();

       // to count whether there is cart on db or not

       $count = DB::table('carts')->
       where('user_id',$userId)
       ->where('user_email',$email)->get();

      // dd($count);

       //  end of to count whether there is cart on db or not

             
         
    return view('frontend.bag.bag_list',(['result'=>$cart,'results'=>$carts]));
       
         //->with //compact(['cart','carts']));
    }



    public function updateCart(Request $request,$id){

         //return json_encode("update cart");

         $loginId = session::get('id');
            $loginemail = session::get('email');
      
        $rowid = $request->rowid;
        $Product_id = $request->prodId;
         $quantity = $request->qty;

         //dd($rowid);

         if($quantity<0){
            alert("number should not be negative");
         }


         $unit_price = DB::table('carts')->select('food_price')
         ->where('id',$rowid)
         ->where('food_id', $Product_id)
         ->first();

       
               

            $unitprice =    $unit_price->food_price;
            $tot=$quantity*$unitprice;

         // update cart items and its total price
         $UpdateItems = DB::table('carts')
         ->where('id', $rowid)
         ->where('food_id',$Product_id)

         ->update([ 'quantity' => $quantity, 'total_price' => $tot]);// $quantity* $unitprice]);


         $UpdateItems1 = DB::table('carts')
        // ->where('id', $rowid)
         //->where('food_id',$Product_id)
         ->where('user_id',$loginId)
        ->where('user_email',$loginemail)
         ->get();


         $useIDTotal = DB::table('carts')
        ->where('user_id',$loginId)
        ->where('user_email',$loginemail)->count() ;

        $Total1 = DB::table('carts')->select('total_price')

        ->where('user_id',   $loginId)
        ->where('user_email',$loginemail)
        ->get() ;
   

        $total = 0;

        for($i=$useIDTotal;$i<=$useIDTotal;$i++){

            foreach($Total1 as $obj){

                $total += $obj->total_price;


            }


        }

         $updateTotal = DB::table('grand_totals')
         ->where('user_id',$loginId)
         ->where('email', $loginemail)
         ->update(['all_total'=>$total +100]);



         $updateTotal1 = DB::table('grand_totals')
         ->where('user_id',$loginId)
         ->where('email', $loginemail)->get();

       // $request->session()->flash('success', ' hello');
         return view('frontend.bag.upcarts',['result'=>$UpdateItems1 ,'results'=>$updateTotal1])->with('status','cart_update');
      //  echo $UpdateItems1;
       /* return response()->json(["subtotal" => $UpdateItems1,"granttotal" =>  $updateTotal1]);*/
          
    }
             

         public function delete(Request $request,$id){

            $sessionId = session::get('id');
            $sessionemail = session::get('email');

          if($request->id>0){

           // dd($total_price);

           // $total_price = 0;

           /* $updateTotal = DB::table('carts')
            ->where('id',$request->id)
            //->where('email', $email)
            ->update(['total_price' =>$total_price]);*/

            /*$countItem = DB::table('carts')->select('id')
            ->where('user_id', $sessionId)
            ->where('user_email',  $sessionemail)
            ->count();*/

            //dd($countItem);

            

            $deleteId = Cart::find($request->id);
           /* ->where('user_id',$sessionId)
            ->where('user_email', $sessionemail);*/

            $success =  $deleteId->delete();


            $countItem = DB::table('carts')->select('id')
            ->where('user_id', $sessionId)
            ->where('user_email',  $sessionemail)
            ->count();

            if($countItem>0){



        $userId = session::get('id');
         $email = session::get('email');
        // dd($email);

        $useIDTotal = DB::table('carts')//->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->count() ;


        $Total1 = DB::table('carts')->select('total_price')

        ->where('user_id',$userId)
        ->where('user_email',$email)->get() ;

        $total = 0;

        for($i=$useIDTotal;$i<=$useIDTotal;$i++){

            foreach($Total1 as $obj){

                $total += $obj->total_price;


            }


        }


        //dd($total);


        $cart = DB::table('grand_totals')->select('user_id','email')

            ->where('user_id',$userId)
            ->where('email', $email)->first();

           if($cart){
            // user has previous total
            //dd('update');

            $updateTotal = DB::table('grand_totals')
            ->where('user_id',$cart->user_id)
            ->where('email', $cart->email)
            ->update(['all_total' =>$total]);

        $request->session()->flash('message', 'cart has been success deleted');
        return redirect('index/mycart');



}



            }else{

                // total price is 0
                $total = 0;
            $updateTotal = DB::table('grand_totals')
            ->where('user_id',  $sessionId)
            ->update(['all_total' => $total]);

            $request->session()->flash('failure', ' empty cart');
        return redirect('index/mycart');
            }

          //  dd($countItem);
            
}
        

  }
}