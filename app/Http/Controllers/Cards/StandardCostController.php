<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\Budget;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\StandardCost;
use MasterBudget\Status;
class StandardCostController extends Controller
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
        $name = ["Materias Primas","Mano De Obra Directa", "Gastos De Fabricacion"];
        $cost = $request->cost;
        $total = 0;
        $i = 0;
        foreach($cost as $key => $value){
            $standardCost = New StandardCost();
            $standardCost->name = $name[$i];
            $standardCost->cost = $value;
            $standardCost->budget_id = $request->budget_id;
            $standardCost->company_id = $request->company_id;
            $standardCost->save();
                $total = $total + $value;
            $i++;
        }
        $standardCost = New StandardCost();
        $standardCost->name = "Total";
        $standardCost->cost = $total;
        $standardCost->budget_id = $request->budget_id;
        $standardCost->company_id = $request->company_id;
        $standardCost->save();
        $statusServiceDepartment = Status::find($request->budget_id);
        $statusServiceDepartment->standard_cost = 1;
        $statusServiceDepartment->save();

        return redirect()->route('standardHours.show', $request->budget_id);

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
        $statusStandardCost = $status->standard_cost;
        if ($statusStandardCost === 0) {
            $title = "Costos Estandares De Produccion";
            $menu = 2;
            $budget = Budget::find($id);
            return view('adminlte::cards.costStandard', compact('menu', 'budget', 'title'));
        }else{
            $title = "Costos Estandares De Produccion";
            $menu = 2;
            $budget = Budget::find($id);
            $standardCost = StandardCost::where('budget_id','=',$id)->get();
            return view('adminlte::cards.view.viewCostStandard', compact('menu', 'budget', 'title','standardCost'));
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
