<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';

    protected $fillable = [
        'name', 'day','month','year','user_id'
    ];

    //Relacion de uno a uno
    public function user()
    {
        return $this->hasOne('MasterBudget\User');
    }

    //Relacion de uno a uno
    public function company()
    {
        return $this->hasOne('MasterBudget\Company');
    }
    //Relacion de uno a uno
    public function product()
    {
        return $this->hasOne('MasterBudget\Product');
    }

    //Relacion de uno a muchos
    public function productionDepartment()
    {
        return $this->hasMany('MasterBudget\ProductionDepartment');
    }
    //Relacion de uno a muchos
    public function serviceDepartment()
    {
        return $this->hasMany('MasterBudget\ServiceDepartment');
    }
    //Relacion de uno a muchos
    public function standardCost()
    {
        return $this->hasMany('MasterBudget\StandardCost');
    }
    //Relacion de uno a muchos
    public function standardHoursOfLabor()
    {
        return $this->hasMany('MasterBudget\StandardHoursOfLabor');
    }
    //Relacion de uno a uno
    public function balanceSheet()
    {
        return $this->hasMany('MasterBudget\BalanceSheet');
    }
    //Relacion uno a muchos
    public function salesForecast(){
        return $this->hasMany('MasterBudget\SalesForecast');
    }
    //Relacion uno a muchos
    public function productionBudget(){
        return $this->hasMany('MasterBudget\ProductionBudget');
    }
    //Relacion uno a muchos
    public function storageBudget(){
        return $this->hasMany('MasterBudget\StorageBudget');
    }
}
