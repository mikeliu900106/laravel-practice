<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherBase', function (Blueprint $table) {
            $table->string('teacher_id',25)->comment("id");
            $table->string('teacher_username',30)->comment("老師帳號名稱");
            $table->string('teacher_password',30)->comment("老師帳號密碼");
            $table->string('teacher_real_name',8)->comment("老師真名");
            $table->string('teacher_email',40)->comment("email");
            $table->string('teacher_level',2)->comment("老師等級");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacherBase');
    }
}
