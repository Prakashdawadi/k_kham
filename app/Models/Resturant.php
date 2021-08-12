<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Resturant extends Model
{
    use HasFactory;
    protected $table ='resturants';
    protected $fillable =[
    				'rest_name',
				    'rest_address',
				    'rest_email',
				    'rest_phone',
				    'rest_ctime',
				    'rest_otime',
				    'rest_status',
				     'rest_image',
				     'added_by',
				     'updated_by'
	];

    

    public function menu(){

    	return $this->hasMany('App\Models\Menu'); 
}

		
}