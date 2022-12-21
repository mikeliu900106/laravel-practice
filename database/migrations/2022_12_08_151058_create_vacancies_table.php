<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacanciesBase', function (Blueprint $table) {
            $table->date('vacancies_create_time');
            $table->string('company_id',25);
            $table->string('vacancies_id',30);
            $table->string('vacancies_name',30);
            $table->string('company_money',30);
            $table->string('company_time',50);
            $table->string('vacancies_county',25);
            $table->string('vacancies_district',30);
            $table->string('vacancies_address',30);
            $table->string('company_content',150);
            $table->string('vacancies_Skill',50);
            $table->string('company_work_experience',50);
            $table->string('company_Education',50);
            $table->string('company_department',30);
            $table->string('company_other',80);
            $table->string('company_safe',150);
            $table->string('teacher_watch',8);
            $table->string('teacher_name',10);
            $table->string('vacancies_match',10);
            $table->string('apply_number',2);
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacanciesBase');
    }
}
