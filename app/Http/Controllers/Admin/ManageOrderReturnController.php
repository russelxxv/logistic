<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ReturnOrderStatus;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\State;

class ManageOrderReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = OrderReturn::query()
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
        return view('edit', [
            'order_return' => OrderReturn::findOrFail($id),
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }
}
