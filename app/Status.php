<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'balance_sheet',
        'budget',
        'company',
        'product',
        'production_budget',
        'production_department',
        'raw_materials',
        'sales_forecast',
        'service_department',
        'standard_cost',
        'standard_hours_of_labor',
        'storage_budget',
        'budget_id'
    ];


    //Relacion de uno a uno
    public function budget()
    {
        return $this->hasOne('MasterBudget\Budget');
    }
}
