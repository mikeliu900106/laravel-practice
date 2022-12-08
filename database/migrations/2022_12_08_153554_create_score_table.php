<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoreBase', function (Blueprint $table) {
            $table->string('user_id',25)->comment("id");
            $table->string('score_file_path',80)->comment("成績單路徑");
            $table->string('score_file_name',55)->comment("成績單名稱");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scoreBase');
    }
}
