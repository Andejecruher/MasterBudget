<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\Budget;
use MasterBudget\ProductionBudget;
use MasterBudget\SalesForecast;
use MasterBudget\Status;

class ProductionBudgetController extends Controller
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

        $month = $request->month;
        $inventoryOfFinishedProducts = $request->inventoryOfFinishedProducts;
        $productionInUnits = $request->productionInUnits;
        $salesForecastInUnits = $request->salesForecastInUnits;
        $finalInventoryOfFinishedProducts = $request->finalInventoryOfFinishedProducts;
        $minimumLevel = $request->minimumLevel;
        $maximumLevel = $request->maximumLevel;
        $budget_id = $request->budget_id;
        $company_id = $request->company_id;
        for($x = 0; $x <= 13; $x++){
            if ($x < 11){
                $productionBudget = new ProductionBudget();
                $productionBudget->month = $month[$x];
                $productionBudget->inventoryOfFinishedProducts = $inventoryOfFinishedProducts[$x];
                $productionBudget->productionInUnits = $productionInUnits[$x];
                $productionBudget->salesForecastInUnits = $salesForecastInUnits[$x];
                $productionBudget->finalInventoryOfFinishedProducts = $finalInventoryOfFinishedProducts[$x];
                $productionBudget->minimumLevel = $minimumLevel[$x];
                $productionBudget->maximumLevel = $maximumLevel[$x];
                $productionBudget->budget_id = $budget_id;
                $productionBudget->company_id = $company_id;
                $productionBudget->save();
            }
            elseif($x > 11){
                $productionBudget = new ProductionBudget();
                $productionBudget->month = $month[$x];
                $productionBudget->inventoryOfFinishedProducts = $inventoryOfFinishedProducts[$x];
                $productionBudget->productionInUnits = $productionInUnits[$x];
                $productionBudget->salesForecastInUnits = $salesForecastInUnits[$x];
                $productionBudget->finalInventoryOfFinishedProducts = $finalInventoryOfFinishedProducts[$x];
                $productionBudget->minimumLevel = "0.00";
                $productionBudget->maximumLevel = "0.00";
                $productionBudget->budget_id = $budget_id;
                $productionBudget->company_id = $company_id;
                $productionBudget->save();
            }
            $statusProductionDepartment = Status::find($request->budget_id);
            $statusProductionDepartment->production_budget = 1;
            $statusProductionDepartment->save();
        }
        return redirect()->route('budget.show', $request->budget_id);

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
        $statusProductionBudget = $status->production_budget;
        if ($statusProductionBudget === 0) {
            $title = "Presupuesto De Producción Para El Año Que Termina El";
            $menu = 2;
            $salesForecast = SalesForecast::where('budget_id', '=', $id)->get();
            $budget = Budget::find($id);
            $year = $budget->year + 1;
            return view('adminlte::cards.productionBudget', compact('menu', 'budget', 'title', 'year', 'salesForecast'));
        }
        else
            {
                $productionBudget = ProductionBudget::where("budget_id", "=", $id)->get();
                $title = "Presupuesto De Producción Para El Año Que Termina El";
                $menu = 2;
                $budget = Budget::find($id);
                $year = $budget->year + 1;
                return view('adminlte::cards.view.viewProductionBudget', compact('menu', 'budget', 'title', 'year', 'productionBudget'));
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
