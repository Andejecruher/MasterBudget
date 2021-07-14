<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_budget', function (Blueprint $table) {
            $table->increments('id');
            $table->text('month');
            $table->text('inventoryOfFinishedProducts');
            $table->text('productionInUnits');
            $table->text('salesForecastInUnits');
            $table->text('finalInventoryOfFinishedProducts');
            $table->text('minimumLevel');
            $table->text('maximumLevel');
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
        Schema::dropIfExists('production_budget');
    }
}
