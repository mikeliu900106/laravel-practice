<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherfileBase', function (Blueprint $table) {
            $table->string('teacher_id',25)->comment("id");
            $table->string('teacher_file_id',30)->comment("老師檔案id");
            $table->string('teacher_file_path',85)->comment("檔案路徑");
            $table->string('teacher_file_name',15)->comment("檔案名稱");
            $table->string('teacher_real_file_name',50)->comment("檔案上傳時名稱");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacherfileBase');
    }
}
