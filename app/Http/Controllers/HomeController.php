<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace MasterBudget\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MasterBudget\Company;
use MasterBudget\Budget;


/**
 * Class HomeController
 * @package MasterBudget\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $menu = 1;
        $budget = Budget::where('user_id',"=", Auth::user()->id)->get();
        return view('adminlte::home', compact('menu','budget'));
    }
}
