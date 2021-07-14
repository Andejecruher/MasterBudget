<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name', 'budget_id', 'company_id'
    ];

    // Relacion de uno a uno
    public function company()
    {
        return $this->hasOne('MasterBudget\Company');
    }
    //Relacion de uno a uno
    public function budget()
    {
        return $this->hasOne('MasterBudget\Budget');
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
}
