<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ManageOrderReturnController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'order_returns' => OrderReturn::all()
        ]);
    }
    
    public function edit($id): View
    {
        return view('edit', [
            'order_return' => OrderReturn::findOrFail($id),
        ]);
    }
}
