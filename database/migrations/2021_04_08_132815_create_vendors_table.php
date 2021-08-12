<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id()->autoIncrements()->unsignedInteger();
            $table->unsignedBigInteger('resturant_id')->nullable();
            $table->string('name');
            $table->string('ven_email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('phone');
            $table->string('address');
            $table->enum('ven_status',['active','inactive'])->default('inactive');
            $table->enum('role',['admin','customer','vendor'])->default('vendor');
            $table->string('resturant_name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
