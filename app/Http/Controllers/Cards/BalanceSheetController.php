<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Http\Request;
use MasterBudget\BalanceSheet;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\Budget;
use MasterBudget\Status;
class BalanceSheetController extends Controller
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
        $balanceSheet = new BalanceSheet();
        $balanceSheet->cash  =  $request->cash;
        $balanceSheet->accountsByCoop  =  $request->accountsByCoop;
        $balanceSheet->rawMatriasInventory  =  $request->rawMatriasInventory;
        $balanceSheet->productInventoryFinished  =  $request->productInventoryFinished;
        $balanceSheet->inventoryOfSupplies  =  $request->inventoryOfSupplies;
        $balanceSheet->totalActiveCirculating  =  $request->totalActiveCirculating;
        $balanceSheet->land  =  $request->land;
        $balanceSheet->buildings  =  $request->buildings;
        $balanceSheet->plantEquipmentVehicles  =  $request->plantEquipmentVehicles;
        $balanceSheet->furnitureEnseres  =  $request->furnitureEnseres;
        $balanceSheet->totalActivosFijos  =  $request->totalActivosFijos;
        $balanceSheet->depreciation  =  $request->depreciation;
        $balanceSheet->accumulatedDepreciation  =  $request->accumulatedDepreciation;
        $balanceSheet->activeFix  =  $request->activeFix;
        $balanceSheet->totalActiveFix  =  $request->totalActiveFix;
        $balanceSheet->accountsByCoopPay  =  $request->accountsByCoopPay;
        $balanceSheet->mortgagesForPayingSmallSlapping  =  $request->mortgagesForPayingSmallSlapping;
        $balanceSheet->variousCreditors  =  $request->variousCreditors;
        $balanceSheet->totalPasivoCirculante  =  $request->totalPasivoCirculante;
        $balanceSheet->payingLongSlapping   =  $request->payingLongSlapping ;
        $balanceSheet->totalPassive  =  $request->totalPassive;
        $balanceSheet->socialCapital  =  $request->socialCapital;
        $balanceSheet->actionSalesPrint  =  $request->actionSalesPrint;
        $balanceSheet->retainedUtility  =  $request->retainedUtility;
        $balanceSheet->capitalContable  =  $request->capitalContable;
        $balanceSheet->passiveCapitalAccountable  =  $request->passiveCapitalAccountable;
        $balanceSheet->budget_id = $request->budget_id;
        $balanceSheet->company_id = $request->company_id;
        $balanceSheet->save();
        $statusServiceDepartment = Status::find($request->budget_id);
        $statusServiceDepartment->balance_sheet = 1;
        $statusServiceDepartment->save();
        return redirect()->route('salesForecast.show', $request->budget_id);
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
        $statusBalanceSheet = $status->balance_sheet ;
        if ($statusBalanceSheet === 0) {
            $title = "Balance General Inicial";
            $menu = 2;
            $budget = Budget::find($id);
            return view('adminlte::cards.balanceSheet', compact('menu', 'budget', 'title'));
        }
        else
        {
            $title = "Balance General Inicial";
            $menu = 2;
            $balanceSheet = BalanceSheet::where("budget_id","=",$id)->get();
            $budget = Budget::find($id);
           //return response()->json($balanceSheet);
            return view('adminlte::cards.view.viewBalanceSheet', compact('menu', 'budget', 'title','balanceSheet'));
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
