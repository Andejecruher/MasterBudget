<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class ProductionBudget extends Model
{
    protected $table = 'production_budget';

    protected $fillable = [
        'month','inventoryOfFinishedProducts','productionInUnits','salesForecastInUnits','finalInventoryOfFinishedProducts','minimumLevel','maximumLevel','budget_id','company_id'
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
