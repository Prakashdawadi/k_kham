<?php

namespace App\Http\Controllers;

use App\models\Cart;
use App\Models\Fronend;
use App\Models\Bannner;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Http\Request;

class FronendController extends Controller
{ 
    protected $banner, $category, $resturant;

    public function __construct(Bannner $bannner,Category $category, Resturant $resturant, Cart $cart)
    {
     
        $this->bannner   = $bannner;
      /*  $this->category  = $category;*/
        $this->resturant = $resturant;
        $this->cart      = $cart;
       
    }


    public function index1(Request $request)
    {
       //$data = $this->resturant->where('rest_status','active')->get();

      // dd($data);
      //if($request->session()->has('USER_LOGIN')){
       if(Auth::guard('customer')->check()){
        return view('frontend.front.index')
        ->with('bannner_data',$this->bannner->where('bans_status','active')->get())
       /* ->with('cats_data',$this->category->where('status','active')->get())*/
        ->with('rest_data',$this->resturant->where('rest_status','active')->get());
      /*  ->with('cart_count',$this->cart)->get());*/
                                                
              }else{


      return view('frontend.front.index')
        ->with('bannner_data',$this->bannner->where('bans_status','active')->get())
     /*   ->with('cats_data',$this->category->where('status','active')->get())*/
        ->with('rest_data',$this->resturant->where('rest_status','active')->get());
       
       } 
    }
   




 public function eachresturant(Request $request){

  //dd("hello");

    $rest = $request->rest;
    //dd($rest);

  
    //ssdd($data);

    $data1['result'] = DB::table('menus')->join('resturants','resturants.id','rests_id')

    ->where('resturants.rest_name',$rest)
   // ->where('menus.id', $data['result'])


    ->get();
  /*$data['result'] = DB::table('menus')->select('id')
 
  ->get();*/

    
  

    //dd($data1);


    
    return view('frontend.resturant.resturants', $data1);
     
 }

   

   public function resturant_list(Request $request){

      $cat = $request->cats;
      //dd($cat);

      $data['result'] = DB::table('resturants')->join('categories','categories.id','resturants.category_id')
      ->where('categories.cats_name', $cat)->get(); 

 //dd($data);
       return view('frontend.resturant.resturant_list',$data);
      
   }
}
