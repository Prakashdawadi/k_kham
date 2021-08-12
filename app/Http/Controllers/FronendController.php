<?php

namespace App\Http\Controllers;

use App\models\Cart;
use App\Models\Fronend;
use App\Models\Bannner;
use App\Models\Category;
use App\Models\Resturant;
use App\models\Menu;
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
       if(Auth::guard('customer')->check()){
        return view('frontend.front.index')
        ->with('bannner_data',$this->bannner->where('bans_status','active')->get())
      
        ->with('rest_data',$this->resturant->where('rest_status','active')->get());
                                          
              }else{
      return view('frontend.front.index')
        ->with('bannner_data',$this->bannner->where('bans_status','active')->get())
     
        ->with('rest_data',$this->resturant->where('rest_status','active')->get());
       
       } 
    }
   
 public function eachresturant(Request $request){


  $menuInfo['result'] = Menu::with('resturantName')
                    ->where('rests_id',$request->id)->get();
      



    return view('frontend.resturant.resturants', $menuInfo);
     
 }

   public function resturant_list(Request $request){
      $cat = $request->cats;

      $data['result'] = DB::table('resturants')->join('categories','categories.id','resturants.category_id')
      ->where('categories.cats_name', $cat)->get(); 
       return view('frontend.resturant.resturant_list',$data);
      
   }
}
