<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
       
            $table->id()->autoIncrements()->unsignedInteger();
            $table->string('rest_name');
            $table->string('rest_address');
            $table->string('rest_email')->unique();
            $table->unsignedBigInteger('rest_phone');
            $table->timeTz('rest_otime',0);
            $table->timeTz('rest_ctime',0);
            $table->string('rest_image');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->enum('rest_status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('resturants');
    }
}
