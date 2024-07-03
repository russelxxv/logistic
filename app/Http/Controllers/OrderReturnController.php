<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderReturnRequest;
use App\Models\OrderReturnReason;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderReturnController extends Controller
{
    public function index(): View
    {
        return view('order-return.index', [
            'productCategories' => ProductCategory::all(),
            'reasons' => OrderReturnReason::all(),
        ]);
    }

    public function store(OrderReturnRequest $request)
    {
        $data = $request->validated();

        // $orderReturn = [
        //     'order_return' => $data['']
        // ];

        // foreach($data['item_number'] as $item)

        dd($data);
    }
}
