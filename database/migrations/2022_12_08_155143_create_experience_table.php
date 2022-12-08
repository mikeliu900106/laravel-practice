<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experienceBase', function (Blueprint $table) {
            $table->string('user_id',25)->comment("id");
            $table->string('Experience_file_path',85)->comment("心得路徑");
            $table->string('Experience_file_name',45)->comment("心得檔案名稱");
            $table->string('Experience_comment',50)->comment("心得評論")->nullable();
            $table->string('Experience_else',75)->comment("心得其他評論")->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experienceBase');
    }
}
