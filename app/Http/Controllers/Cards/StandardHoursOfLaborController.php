<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\ProductionDepartment;
use MasterBudget\StandardHoursOfLabor;
use MasterBudget\Budget;
use MasterBudget\Status;
class StandardHoursOfLaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $hour = $request->hour;
        $i = 0;
        foreach($name as $key => $value){
            $standarHours = New StandardHoursOfLabor();
            $standarHours->area = $value;
            $standarHours->hour = $hour[$i];
            $standarHours->budget_id = $request->budget_id;
            $standarHours->company_id = $request->company_id;
            $standarHours->save();
            $i++;
        }
        $statusServiceDepartment = Status::find($request->budget_id);
        $statusServiceDepartment->standard_hours_of_labor = 1;
        $statusServiceDepartment->save();
        return redirect()->route('balanceSheet.show', $request->budget_id);
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
        $statusStandardHoursCost = $status->standard_hours_of_labor;
        if ($statusStandardHoursCost === 0) {
            $productionDepartment = ProductionDepartment::where('budget_id', '=', $id)->get();
            $budget = Budget::find($id);
            $title = "Costo De Horas Estandar De Mano De Obra";
            $menu = 2;
            return view('adminlte::cards.standardHoursOfLabor', compact('menu', 'budget', 'title', 'productionDepartment'));
        }else{
            $statusStandardHoursCost = StandardHoursOfLabor::where('budget_id', '=', $id)->get();
            $budget = Budget::find($id);
            $title = "Costo De Horas Estandar De Mano De Obra";
            $menu = 2;
            return view('adminlte::cards.view.viewStandardHourOfLabor', compact('menu', 'budget', 'title', 'statusStandardHoursCost'));
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
