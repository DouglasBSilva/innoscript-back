<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $condominios = Cart::latest()->get();

        return response()->json($condominios);
    }

    public function store(CartRequest $request)
    {
        $condominio = Cart::create($request->all());

        return response()->json($condominio, 201);
    }

    public function show($id)
    {
        $condominio = Cart::findOrFail($id);

        return response()->json($condominio);
    }

    public function update(CartRequest $request, $id)
    {
        $condominio = Cart::findOrFail($id);
        $condominio->update($request->all());

        return response()->json($condominio, 200);
    }

    public function destroy($id)
    {
        Cart::destroy($id);

        return response()->json(null, 204);
    }
}
