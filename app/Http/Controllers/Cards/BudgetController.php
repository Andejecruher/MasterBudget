<?php

namespace MasterBudget\Http\Controllers\Cards;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\Budget;
use MasterBudget\Company;
use MasterBudget\Product;

class BudgetController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($name, $day, $month, $year)
    {
        $budget = New Budget();
        $budget->name = "Presupuesto Maestro ".$name;
        $budget->day = $day;
        $budget->month = $month;
        $budget->year = $year;
        $budget->user_id = Auth::user()->id;
        $budget->save();
        return $budget->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::where('id',"=",$id)->get();
        $title = "Datos De La Empresa";
        $menu = 2;
        return view('adminlte::cards.company',compact('menu','budget','title'));
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
    public function update($id, $name, $day, $month, $year)
    {
        $budget = Budget::where('id','=',$id)->first();
        $budget->name = "Presupuesto Maestro ".$name;
        $budget->day = $day;
        $budget->month = $month;
        $budget->year = $year;
        $budget->save();
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
