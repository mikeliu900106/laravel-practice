<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userBase', function (Blueprint $table) {
            $table->date('user_create_time');
            $table->string('user_id',25)->comment("id");
            $table->string('student_id',10)->comment("學號");
            $table->string('user_name',10)->comment("帳號");
            $table->string('user_real_name',10)->comment("真名");
            $table->string('user_password',30)->comment("密碼");
            $table->string('user_email',40)->comment("email");
            $table->string('user_level',2)->comment("帳號等級");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userBase');
    }
}
