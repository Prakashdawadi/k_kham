<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    protected $fillable =['menu_name','menu_price','rests_name','menu_status'];


    public function resturantss(){

    	return $this->belongTo('App\Models\Resturant');


    }


    public function cart(){

    	return $this->hasMany('App\Models\Cart');

    }


}
