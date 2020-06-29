<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $condominios = Product::with('values')->get();

        return response()->json($condominios);
    }

    public function store(ProductRequest $request)
    {
        $condominio = Product::create($request->all());

        return response()->json($condominio, 201);
    }

    public function show($id)
    {
        $condominio = Product::findOrFail($id);

        return response()->json($condominio);
    }

    public function update(ProductRequest $request, $id)
    {
        $condominio = Product::findOrFail($id);
        $condominio->update($request->all());

        return response()->json($condominio, 200);
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(null, 204);
    }
}
