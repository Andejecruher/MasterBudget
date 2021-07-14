<?php

namespace MasterBudget\Http\Controllers\Auth;

use MasterBudget\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class NoGuestForgotPasswordController.
 *
 * @package MasterBudget\Http\Controllers\Auth
 */
class NoGuestForgotPasswordController extends ForgotPasswordController
{

    /**
     * NoGuestForgotPasswordController constructor.
     *
     */
    public function __construct()
    {
        //Let authenticated users use this controller.
//        $this->middleware('guest');
    }
}
