<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class StandardHoursOfLabor extends Model
{
    protected $table = 'standard_hours_of_labor';

    protected $fillable = [
        'name', 'budget_id','product_id'
    ];
    //Relacion de uno a uno
    public function budget()
    {
        return $this->hasOne('MasterBudget\Budget');
    }
    //Relacion uno a uno
    public function product()
    {
        return $this->hasOne('MasterBudget\Product');
    }
}
