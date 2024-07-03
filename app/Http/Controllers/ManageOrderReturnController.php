<?php

namespace App\Http\Controllers;

use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManageOrderReturnController extends Controller
{
    public function index()
    {
        dd(OrderReturn::all());
        return view('dashboard', [
            'order_returns' => []
        ]);
    }
}
