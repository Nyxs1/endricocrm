<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount([
            'subscriptions as active_services_count' => function ($q) {
                $q->where('status', 'active');
            }
        ])->latest()->get();

        return view('customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        $customer->load(['subscriptions.service']);
        return view('customers.show', compact('customer'));
    }
}
