<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\Budget;
use MasterBudget\SalesForecast;
use MasterBudget\Status;

class SalesForecastController extends Controller
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
        $forecast = $request->forecast;
        $price = $request->price;
        $salesBudget = $request->salesBudget;
        for ($x=0; $x <= 12; $x++){
            $salesForecast = new SalesForecast();
            $salesForecast->month = $month[$x];
            $salesForecast->forecast = $forecast[$x];
            $salesForecast->price = $price[$x];
            $salesForecast->salesBudget = $salesBudget[$x];
            $salesForecast->budget_id = $request->budget_id;
            $salesForecast->company_id = $request->company_id;
            $salesForecast->save();
        }
        $statusProductionDepartment = Status::find($request->budget_id);
        $statusProductionDepartment->sales_forecast  = 1;
        $statusProductionDepartment->save();
        return redirect()->route('productionBudget.show', $request->budget_id);
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
        $statusSalesForecast = $status->sales_forecast;
        if ($statusSalesForecast === 0) {
            $title = "Pronostico De Ventas En Unidades Para El Año Que Termina El";
            $menu = 2;
            $budget = Budget::find($id);
            $year = $budget->year + 1;
            return view('adminlte::cards.salesForecast', compact('menu', 'budget', 'title', 'year'));
        }
        else
        {
            $salesForecast = SalesForecast::where("budget_id", "=", $id)->get();
            $title = "Pronostico De Ventas En Unidades Para El Año Que Termina El";
            $menu = 2;
            $budget = Budget::find($id);
            $year = $budget->year + 1;
            return view('adminlte::cards.view.viewSalesForecast', compact('menu', 'budget', 'title', 'year','salesForecast'));
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
