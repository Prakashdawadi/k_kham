<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id()->autoIncrements()->unsignedInteger();
            $table->integer('food_id');
            $table->string('food_name');
            $table->string('res_name');
            $table->integer('quantity');
            $table->integer('food_price');
            $table->integer('total_price');
            $table->string('session_id');
            $table->integer('user_id');
            $table->string('user_email');
            $table->integer('rest_id');
            $table->enum('status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('carts');
    }
}
