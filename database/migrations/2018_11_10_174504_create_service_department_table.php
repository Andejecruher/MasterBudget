<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_department', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
            $table->integer('budget_id')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budget');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_department');
    }
}
