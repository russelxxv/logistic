<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class VerifyCustomerController extends Controller
{
    public function index(): View
    {
        return view('verify-index');
    }

    public function checkEmail()
    {
        // is true exists in customer table
        // then assign
        Session::put('unknown_client', false);

        //otherwise
    }
}
