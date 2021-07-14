<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'name', 'budget_id'
    ];


    //Relacion de uno a uno
    public function budget()
    {
        return $this->hasOne('MasterBudget\Budget');
    }
    //Relacion de uno a muchos
    public function product()
    {
        return $this->hasMany('MasterBudget\Product');
    }

    //Relacion uno a uno
    public function balanceSheet()
    {
        return $this->hasMany('MasterBudget\BalanceSheet');
    }
}
