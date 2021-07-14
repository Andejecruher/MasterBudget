<?php

namespace MasterBudget\Http\Controllers\Cards;



use Illuminate\Support\Facades\Auth;
use MasterBudget\Http\Controllers\Controller;
use MasterBudget\User;
use MasterBudget\Company;
use MasterBudget\Budget;
use Illuminate\Http\Request;


class CompanyController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $budget = new BudgetController();
        $product = new ProductController();
        $status = new StatusController();
        $company = New Company();
        $company->name = $request->name;
        $company->budget_id = $budget->store($request->name, $request->day, $request->month, $request->year);
        $company->save();
        $product->store($request->product, $company->budget_id, $company->id);
        $status->store($company->budget_id);

        return redirect()->route('budget.show', $company->budget_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        $budget = new BudgetController();
        $budget->update($company->budget_id, $request->name, $request->day, $request->month, $request->year);
        $company->update($request->all());
        return redirect('budget/'.$company->budget_id)->withSuccess('Nombre De La Empresa Actualizado !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Company::where('id',$request->id)->delete();
        return response()->json();
    }
}
