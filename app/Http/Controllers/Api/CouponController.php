<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Coupon::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupon,code',
            'amount' => 'required|numeric',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
        ]);

        $coupon = Coupon::create($data);
        return response()->json($coupon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return response()->json($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupon,code,' . $coupon->id,
            'amount' => 'required|numeric',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
        ]);

        $coupon->update($data);
        return response()->json($coupon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
       $coupon->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
