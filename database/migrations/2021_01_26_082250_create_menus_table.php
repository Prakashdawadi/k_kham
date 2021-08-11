<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
        
            $table->id()->autoIncrements()->unsignedInteger();
            $table->string('menu_name');
            $table->Integer('menu_price');
            $table->foreignId('rests_id')->nullable()->constrained('resturants','id')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->enum('menu_status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('menus');
    }
}
