<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::Auth();

Route::group(['middleware' => 'auth'], function () {


    Route::resources([
        'budget'  => 'Cards\BudgetController',
        'company' => 'Cards\CompanyController',
        'product' => 'Cards\ProductController',
        'production' => 'Cards\ProductionDepartmentController',
        'service'   => 'Cards\ServiceDepartmentController',
        'standardCost' => 'Cards\StandardCostController',
        'standardHours' => 'Cards\StandardHoursOfLaborController',
        'balanceSheet' => 'Cards\BalanceSheetController',
        'salesForecast' => 'Cards\SalesForecastController',
        'productionBudget' => 'Cards\ProductionBudgetController',
        'storageBudget' => 'Cards\StorageBudgetController',
        'rawMaterials' => 'Cards\RawMaterialsController',
        'status' => 'Cards\StatusController',
    ]);
    //Route Crud Ajax ProductionDepartment

    Route::post('production/ajax', 'Cards\ProductionDepartmentController@insert');

});
