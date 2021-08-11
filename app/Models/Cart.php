<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;

class Cart extends Model
{
	protected $table = "carts";
    use HasFactory;
/*
     public static function cartitems(){

    if(Auth::check()){

	    	$cartitems = Cart::with('menu')->where('user_id', Auth::user()->id)->get()->toArray();

	    }else{

	    	$cartitems = Cart::with('menu')->where('session_id',Session::get('session_id'))->get()->toArray();
	    }
	    return $cartitems;
	}

       public function menu(){

    	return $this->belongsTo('App\Models\Menu','cart_id');

    }*/


    /* public static function cartitems(){

    if(Auth::check()){

	    	$cartitems = Cart::where('user_id', Auth::user()->id)->get()->toArray();

	    }else{

	    	$cartitems = Cart::where('session_id',Session::get('session_id'))->get()->toArray();
	    }
	    return $cartitems;
	}

       public function menu(){

    	return $this->belongsTo('App\Models\Menu','cart_id');

    }*/


}



