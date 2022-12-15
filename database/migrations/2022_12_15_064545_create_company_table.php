<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyBase', function (Blueprint $table) {
            $table->string('company_id',25);
            $table->string('company_name',30);
            $table->string('company_title',30);
            $table->string('company_username',30);
            $table->string('company_password',30);
            $table->integer('company_number');
            $table->string('company_county',45);
            $table->string('company_district',45);
            $table->string('company_address',45);
            $table->string('company_email',45);
            $table->string('level',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companyBase');
    }
}
