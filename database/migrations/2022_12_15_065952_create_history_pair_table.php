<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historyPairBase', function (Blueprint $table) {

                $table->date('delete_time')->comment("刪除時間");
                $table->string('vacancies_id',25)->comment("職缺id");
                $table->date('start_time')->comment("開始時間");
                $table->date('end_time')->comment("結束時間");
                $table->string('teacher_confirm',8)->comment("是否確認");
                $table->string('teacher_name',5)->comment("同意人");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historyPairBase');
    }
}
