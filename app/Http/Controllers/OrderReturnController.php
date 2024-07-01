<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderReturnRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderReturnController extends Controller
{
    public function index(): View
    {
        return view('order-return.index', [
            'productCategory' => ProductCategory::all()
        ]);
    }

    public function store(OrderReturnRequest $request)
    {
        $data = $request->validated();

        dd($data);
    }
}
