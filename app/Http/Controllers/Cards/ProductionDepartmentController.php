<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\ProductionDepartment;
use MasterBudget\Budget;
use MasterBudget\Status;

class ProductionDepartmentController extends Controller
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
    public function create($id)
    {
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
        foreach($name as $key => $value){
            $departmentProduction = New ProductionDepartment();
            $departmentProduction->name = $value;
            $departmentProduction->budget_id = $request->budget_id;
            $departmentProduction->company_id = $request->company_id;
            $departmentProduction->save();
        }
        $statusProductionDepartment = Status::find($request->budget_id);
        $statusProductionDepartment->production_department = 1;
        $statusProductionDepartment->save();
        return redirect()->route('rawMaterials.show', $request->budget_id);


    }

    /**
     * InsertData a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $departmentProduction = New ProductionDepartment();
        $departmentProduction->name = $request->name;
        $departmentProduction->budget_id = $request->budget_id;
        $departmentProduction->company_id = $request->company_id;
        $departmentProduction->save();
        return redirect()->route('production.show',  $departmentProduction->budget_id);
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
        $statusdepartmentProduction = $status->production_department;
        if ($statusdepartmentProduction === 0){
            $title = "Departamentos De Producción";
            $menu = 2;
            $budget = Budget::find($id);
            return view('adminlte::cards.productionDepartment', compact('menu','budget', 'title'));
        }else{
            $title = "Departamentos De Producción";
            $menu = 2;
            $departmentProduction = ProductionDepartment::where('budget_id','=',$id)->get();
            $budget = Budget::find($id);
            return view('adminlte::cards.view.viewProductionDepartment', compact('menu','budget', 'title','departmentProduction'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {


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
        return $request->name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $departmentProduction = ProductionDepartment::find($id);
        if (is_null ($departmentProduction))
        {
            App::abort(404);
        }
        $message = "El Departamento " . $departmentProduction->name . " Fue Eliminado";
        $departmentProduction->delete();
        if ($request->ajax()){
            return response()->json([
                'id' => $departmentProduction->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('production.show');
    }
}
