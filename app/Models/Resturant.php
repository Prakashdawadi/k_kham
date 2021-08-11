<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Resturant extends Model
{
    use HasFactory;
    protected $table ='resturants';
    protected $fillable =['rest_name','rest_address','rest_email','rest_phone','rest_otime','rest_otime','rest_status'];

    public function category(){

    	return $this->belongsTo('App\Models\Category');
    }

    public function menu(){

    	return $this->hasMany('App\Models\Menu'); 
}

		
}