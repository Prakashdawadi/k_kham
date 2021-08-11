<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
     use HasFactory, Notifiable;
    // protected $guard = 'admin';
      protected $table = 'admins';
       protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];
     protected $hidden = [
        'password',
        'remember_token',
    ];

      protected $primaryKey = 'id';
}
