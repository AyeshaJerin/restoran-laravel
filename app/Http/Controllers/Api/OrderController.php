<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'billing_address' => 'nullable|string',
            'billing_city' => 'nullable|integer',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|integer',
            'order_date' => 'nullable|date',
            'sub_total' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'grand_total' => 'nullable|numeric',
            'delivery_date' => 'nullable|date',
            'order_status' => 'nullable|integer',
            'cart_details' => 'nullable|string',
        ]);

        $order = Order::create($data);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
       return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
       $order->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
