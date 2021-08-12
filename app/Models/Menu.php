<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable =[
                    'menu_name',
                    'menu_price',
                    'rests_id',
                    'rests_name',
                    'menu_status',
                    'ingredients',
                    'menu_image',
                    'direction',
                    'added_by',
                    'updated_by'
                ];


    public function resturantss(){

    	return $this->belongTo('App\Models\Resturant');


    }


    public function cart(){

    	return $this->hasMany('App\Models\Cart');

    }


}
