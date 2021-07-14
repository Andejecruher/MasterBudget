<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_sheet', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cash');
            $table->text('accountsByCoop');
            $table->text('rawMatriasInventory');
            $table->text('productInventoryFinished');
            $table->text('inventoryOfSupplies');
            $table->text('totalActiveCirculating');
            $table->text('land');
            $table->text('buildings');
            $table->text('plantEquipmentVehicles');
            $table->text('furnitureEnseres');
            $table->text('totalActivosFijos');
            $table->text('depreciation');
            $table->text('accumulatedDepreciation');
            $table->text('activeFix');
            $table->text('totalActiveFix');
            $table->text('accountsByCoopPay');
            $table->text('mortgagesForPayingSmallSlapping');
            $table->text('variousCreditors');
            $table->text('totalPasivoCirculante');
            $table->text('payingLongSlapping');
            $table->text('totalPassive');
            $table->text('socialCapital');
            $table->text('actionSalesPrint');
            $table->text('retainedUtility');
            $table->text('capitalContable');
            $table->text('passiveCapitalAccountable');
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
        Schema::dropIfExists('balance_sheet');
    }
}
