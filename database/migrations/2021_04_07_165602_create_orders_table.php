<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->id()->autoIncrements()->unsignedInteger();
          $table->unsignedBigInteger('order_id');
           $table->integer('rest_id');
           $table->string('rest_name');
           $table->json('order_items');
           $table->json('quantity');
           $table->json('sub_total');
           $table->integer('user_id');
           $table->string('user_name');
           $table->string('email');
           $table->unsignedBigInteger('phone');
           $table->string('user_address');
           $table->integer('all_total');
           $table->string('payment_mode');
           $table->enum('status',['preparing','Ontheway','delivered','cancelled'])->default('preparing');
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
        Schema::dropIfExists('orders');
    }
}
