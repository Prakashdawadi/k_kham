<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannner extends Model
{
    //use HasFactory;
    protected $table = "bannners";

    protected $fillable =[
    	          'bans_name',
    	          'bans_link',
    	          'bans_image',
    	          'bans_status',
    	          'added_by',
    	          'updated_by',
    	      			];

}
