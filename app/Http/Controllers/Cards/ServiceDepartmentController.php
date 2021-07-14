<?php

namespace MasterBudget\Http\Controllers\Cards;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MasterBudget\Budget;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\ServiceDepartment;
use MasterBudget\Status;
class ServiceDepartmentController extends Controller
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
            $service = New ServiceDepartment();
            $service->name = $value;
            $service->budget_id = $request->budget_id;
            $service->company_id = $request->company_id;
            $service->save();
        }
        $statusServiceDepartment = Status::find($request->budget_id);
        $statusServiceDepartment->service_department = 1;
        $statusServiceDepartment->save();
        return redirect()->route('standardCost.show', $request->budget_id);
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
        $statusServiceDepartment = $status->service_department;
        if ($statusServiceDepartment === 0) {
            $title = "Departamentos De Servicios";
            $menu = 2;
            $budget = Budget::find($id);
            return view('adminlte::cards.serviceDepartment', compact('menu', 'budget', 'title'));
        }else{
            $title = "Departamentos De Servicios";
            $menu = 2;
            $serviceDepartment = ServiceDepartment::where('budget_id','=',$id)->get();
            $budget = Budget::find($id);
            return view('adminlte::cards.view.viewServiceDepartment', compact('menu', 'budget', 'title','serviceDepartment'));
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
