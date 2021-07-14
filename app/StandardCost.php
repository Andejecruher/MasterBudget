<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class StandardCost extends Model
{
    protected $table = 'standard_cost';

    protected $fillable = [
        'name','cost', 'budget_id','company_id'
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
