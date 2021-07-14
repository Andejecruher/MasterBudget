<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('balance_sheet');
            $table->boolean('budget');
            $table->boolean('company');
            $table->boolean('product');
            $table->boolean('production_budget');
            $table->boolean('production_department');
            $table->boolean('raw_materials');
            $table->boolean('sales_forecast');
            $table->boolean('service_department');
            $table->boolean('standard_cost');
            $table->boolean('standard_hours_of_labor');
            $table->boolean('storage_budget');
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
        Schema::dropIfExists('status');
    }
}
