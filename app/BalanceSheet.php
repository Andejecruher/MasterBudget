<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class BalanceSheet extends Model
{
    protected $table = 'balance_sheet';

    protected $fillable = [
        'cash',
        'accountsByCoop',
        'rawMatriasInventory',
        'productInventoryFinished',
        'inventoryOfSupplies',
        'totalActiveCirculating',
        'land',
        'buildings',
        'plantEquipmentVehicles',
        'furnitureEnseres',
        'totalActivosFijos',
        'depreciation',
        'accumulatedDepreciation',
        'activeFix',
        'totalActiveFix',
        'accountsByCoopPay',
        'mortgagesForPayingCortoSlapping',
        'variousCreditors',
        'totalPasivoCirculante',
        'payingLongSlapping',
        'totalPassive',
        'socialCapital',
        'actionSalesPrint',
        'retainedUtility',
        'capitalContable',
        'passiveCapitalAccountable',
        'budget_id',
        'company_id'
    ];
    //Relacion de uno a uno
    public function budget()
    {
        return $this->hasOne('MasterBudget\Budget');
    }
    //Relacion uno a uno
    public function company()
    {
        return $this->hasOne('MasterBudget\Company');
    }

}
