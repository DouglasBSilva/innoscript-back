<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $condominios = Customer::latest()->get();

        return response()->json($condominios);
    }

    public function store(CustomerRequest $request)
    {
        $condominio = Customer::create($request->all());

        return response()->json($condominio, 201);
    }

    public function show($id)
    {
        $condominio = Customer::findOrFail($id);

        return response()->json($condominio);
    }

    public function update(CustomerRequest $request, $id)
    {
        $condominio = Customer::findOrFail($id);
        $condominio->update($request->all());

        return response()->json($condominio, 200);
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return response()->json(null, 204);
    }
}
