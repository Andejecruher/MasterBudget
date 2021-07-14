<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class SalesForecast extends Model
{
    protected $table = 'sales_forecast';

    protected $fillable = [
        'month','forecast','price','salesBudget','budget_id','company_id'
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
