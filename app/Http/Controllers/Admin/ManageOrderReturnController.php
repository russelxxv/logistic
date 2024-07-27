<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ReturnOrderStatus;
use App\Events\UpdateOrderReturn;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageOrderReturnRequest;
use App\Models\Address\Country;
use App\Models\Address\Us\UsCity;
use App\Models\Address\Us\UsState;
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

        // $paginate = $query->paginate(10);
        $paginate = $query->get();
        
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
            'us_states' => UsState::all(),
            'us_cities' => UsCity::all(),
            'productCategories' => ProductCategory::all(),
            'reasonChoices' => OrderReturnReason::all(),
        ]);
    }

    public function update(ManageOrderReturnRequest $request, $id)
    {
        $validated = $request->validated();
        $orderReturn = OrderReturn::findOrFail($id);

        $orderReturn->update([
            'order_number' => $validated['order_number'],
            'order_return_reason_id' => $validated['return_reason_id'],
            'details' => $validated['details'],
        ]);

        // Delete the existing record
        $orderReturn->returnItems()->delete();
        $orderReturn->productCategories()->delete();

        // Then create a new set of record
        foreach($validated['item_number'] as $item) {
            $orderReturn->returnItems()->create(['item_number' => $item]);
        }

        foreach($validated['product_category'] as $category) {
            $orderReturn->productCategories()->create(['product_category_id' => $category]);
        }

        // dd($validated);

        Session::flash('order_return.updated', 'Order Details Updated');
        return redirect()->back();
    }

    public function receivedOrderReturn($id)
    {
        $order = OrderReturn::findOrFail($id);

        $order->update([
            'status' => ReturnOrderStatus::RECEIVED->value,
        ]);

        UpdateOrderReturn::dispatch($order);

        Session::flash('order.status', 'Order Status Updated');
        return redirect()->back();
    }
}
