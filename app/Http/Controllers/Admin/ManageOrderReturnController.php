<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ReturnOrderStatus;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageOrderReturnRequest;
use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\State;
use App\Models\OrderReturnProductCategory;
use App\Models\OrderReturnReason;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Session;

class ManageOrderReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = OrderReturn::query()
            ->select('order_returns.*')
            ->leftJoin('customers', 'customers.id', '=', 'order_returns.customer_id');

        if ($request->filled('filter_status')) {
            $query->where('order_returns.status', $request->filter_status);
        }

        if ($request->filled('filter_phone')) {
            $query->orWhere('customers.phone', 'like', '%'.$request->filter_phone.'%');
        }

        $paginate = $query->paginate(10);
        
        return view('dashboard', [
            'order_returns' => $paginate,
            'statuses' => [
                'new' => ReturnOrderStatus::NEW->value,
                'received' => ReturnOrderStatus::RECEIVED->value,
            ]
        ]);
    }
    
    public function edit($id): View
    {
        $orderReturn = OrderReturn::findOrFail($id);

        return view('edit', [
            'order_return' => $orderReturn,
            'selectedProducts' => $orderReturn->productCategories->pluck('product_category_id')->toArray(),
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
            'productCategories' => ProductCategory::all(),
            'reasonChoices' => OrderReturnReason::all(),
        ]);
    }

    public function update(ManageOrderReturnRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }

    public function receivedOrderReturn($id)
    {
        $order = OrderReturn::findOrFail($id);

        $order->update([
            'status' => ReturnOrderStatus::RECEIVED->value,
        ]);

        Session::flash('order.status', 'Order Status Updated');
        return redirect()->back();
    }
}
