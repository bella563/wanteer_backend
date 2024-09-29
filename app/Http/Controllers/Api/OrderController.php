<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:pending,completed,canceled',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:pending,completed,canceled',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
