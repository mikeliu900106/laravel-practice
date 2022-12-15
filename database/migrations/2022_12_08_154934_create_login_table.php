<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginBase', function (Blueprint $table) {
            $table->string('id',25)->comment("id");
            $table->string('username',30)->comment("帳號名稱");
            $table->string('password',35)->comment("密碼名稱");
            $table->string('level',3)->comment("等級");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loginBase');
    }
}
