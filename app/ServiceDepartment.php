<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class ServiceDepartment extends Model
{
    protected $table = 'service_department';

    protected $fillable = [
        'name', 'budget_id','company_id'
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
