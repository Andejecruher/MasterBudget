<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardHoursOfLaborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_hours_of_labor', function (Blueprint $table) {
            $table->increments('id');
            $table->text('area');
            $table->text('hour');
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
        Schema::dropIfExists('standard_hours_of_labor');
    }
}
