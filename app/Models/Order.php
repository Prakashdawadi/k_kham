<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    protected  $table = 'orders'; 

    protected $fillable = [
        'name',
        'email',
        'phone',
        
        
        
    ];

    protected $casts = [
    'order_items' => 'array'
];



     public function user(){

    	return $this->belongsTo('App\Models\User');
    }
}
