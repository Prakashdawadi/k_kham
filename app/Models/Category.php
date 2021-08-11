<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	 protected  $table = 'categories'; 
	 protected  $fillable = ['cats_name','cats_slug','status','cats_status'];

	 public function resturant(){

	 	return $this->hasMany('App\Models\Resturant');
   //'rest_image','cats_name'

	 }

}

