<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairBase', function (Blueprint $table) {
            $table->string('user_id',25)->comment("id");
            $table->string('teacher_name',80)->comment("老師名稱");
            $table->string('company_name',55)->comment("公司名稱");
            $table->date('start_time')->comment("開始時間")->nullable();
            $table->date('end_time')->comment("結束時間")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pairBase');
    }
}
