<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bannners', function (Blueprint $table) {
            $table->id()->autoIncrements()->insignedInteger();
            $table->string('bans_name');
            $table->string('bans_link')->nullable();
            $table->string('bans_image',100);
            $table->enum('bans_status',['active','inactive'])->default('inactive');
            $table->foreignId('added_by')->nullable()->constrained('admins','id')->onDelete('SET NULL')->onUpdate('CASCADE');
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
        Schema::dropIfExists('bannners');
    }
}
