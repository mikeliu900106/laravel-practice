<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumeBase', function (Blueprint $table) {
            $table->string('user_id',25)->comment("id");
            $table->string('resume_file_path',80)->comment("履歷路徑");
            $table->string('resume_file_name',55)->comment("履歷名稱");
            $table->string('resume_comment',55)->comment("履歷評論")->nullable();
            $table->string('resume_else',65)->comment("履歷其他")->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumeBase');
    }
}
