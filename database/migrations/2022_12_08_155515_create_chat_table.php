<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatBase', function (Blueprint $table) {
            $table->string('chat_id',20)->comment("id");
            $table->string('chat_maker',50)->comment("聊天人員名稱");
            $table->string('chat_subject',40)->comment("聊天大綱");
            $table->string('chat_content',100)->comment("聊天內容");
            $table->date('chat_date')->comment("聊天日期");
            $table->string('chat_level',2)->comment("聊天等級");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatBase');
    }
}
