<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Order;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::latest()->get();

        return response()->json($carts);
    }

    public function store(Request $request)
    {
        $cart = Cart::create(array('status' => 0, 'customerId' => $request->get('customerId')));
        Order::insert(array_map(function ($order) use ($cart){
            return array(
                'cartId' => $cart->id,
                'productId' => $order['productId'],
                'quantity' => $order['quantity']
            ) ;
        }, $request->get('cart')));
        $cart->status = 1;
        $cart->save();

        return response()->json($cart, 201);
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);

        return response()->json($cart);
    }

    public function update(CartRequest $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        return response()->json($cart, 200);
    }

    public function destroy($id)
    {
        Cart::destroy($id);

        return response()->json(null, 204);
    }
}
