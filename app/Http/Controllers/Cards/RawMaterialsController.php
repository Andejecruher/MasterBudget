<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\ProductionDepartment;
use MasterBudget\Budget;
use MasterBudget\RawMaterials;
use MasterBudget\Status;

class RawMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        $unitsrawmaterial = $request->units;
        $productionDepartament = $request->productionDepartment;
        $budget_id = $request->budget_id;
        $company_id = $request->company_id;
        foreach($name as $key => $value){
            $rawMaterials = new RawMaterials();
            $rawMaterials->name = $value;
            $rawMaterials->description = $description[$key];
            $rawMaterials->unitsrawmaterial = $unitsrawmaterial[$key];
            $rawMaterials->department_production_id = $productionDepartament[$key];
            $rawMaterials->company_id = $company_id;
            $rawMaterials->budget_id = $budget_id;
            $rawMaterials->save();
        }
        $statusRawMaterials = Status::find($request->budget_id);
        $statusRawMaterials->raw_materials = 1;
        $statusRawMaterials->save();
        return redirect()->route('service.show', $request->budget_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Status::find($id);
        $statusRawMaterials = $status->raw_materials;
        if ($statusRawMaterials === 0) {
            $productionDepartment = ProductionDepartment::where('budget_id', '=', $id)->get();
            $budget = Budget::find($id);
            $title = "Materias Primas Por Departamento De Produccion";
            $menu = 2;
            return view('adminlte::cards.rawMaterials', compact('menu', 'budget', 'title', 'productionDepartment'));
        }else{
            $title = "Materias Primas Por Departamento De Produccion";
            $menu = 2;
            $rawMaterials = RawMaterials::where('budget_id','=',$id)->get();
            $budget = Budget::find($id);
            return view('adminlte::cards.view.viewRawMaterials', compact('menu','budget', 'title','rawMaterials'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
