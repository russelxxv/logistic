<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderReturnRequest;
use App\Models\OrderReturn;
use App\Models\OrderReturnItem;
use App\Models\OrderReturnProductCategory;
use App\Models\OrderReturnReason;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $customer = Session::get('customer');

        $orderReturn = OrderReturn::create([
            'order_number' => $data['order_number'],
            'customer_id' => $customer->id,
            'order_return_reason_id' => $data['return_reason_id'],
            'details' => $data['details'],
        ]);

        foreach($data['item_number'] as $item) {
            $orderReturn->returnItems()->create(['item_number' => $item]);
        }

        foreach($data['product_category'] as $category) {
            $orderReturn->productCategories()->create(['product_category_id' => $category]);
        }
        
        Session::flash('order_return.created', 'Return Order Created');

        return redirect()->route('order-return.created');
    }

    public function created(): View
    {
        return view('order-return.created');
    }

    public function closeSession()
    {
        Session::forget('customer');
        Session::save();

        return redirect()->route('customer.create');
    }
}
