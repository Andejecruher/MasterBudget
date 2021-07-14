<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class StorageBudget extends Model
{
    protected $table = 'storage_budget';

    protected $fillable = [
        'storage','percentageStorage','budget_id','company_id'
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
