<?php

namespace MasterBudget;

use Illuminate\Database\Eloquent\Model;

class RawMaterials extends Model
{
    protected $table = 'raw_materials';
    protected $fillable = [
        'name','description','unitsrawmaterial','production_department_id','budget_id','company_id'
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
    //Relacion uno a uno
    public function departmentProduction()
    {
        return $this->hasOne('MasterBudget\ProductionDepartment');
    }

    public function nameDepartment($id){
        $dep =  ProductionDepartment::find($id);
        return $dep->name;
    }
}
