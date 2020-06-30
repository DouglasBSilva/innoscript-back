<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::where('email', $request->get('email'))->get()->first();
        if(!$customer) {
            $customer = Customer::create($request->all());
        }

        return response()->json($customer, 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response()->json($customer, 200);
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return response()->json(null, 204);
    }
}
