<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Coupon;

class FrontendController extends Controller
{
    public function getFood(Request $r){
        $foods = Food::with('category')->where('category_id',$r->category_id)->get();
        return response()->json($foods);
    }

    public function coupon_check(Request $r){
        $foods = Coupon::where('code',$r->code)->first();
        return response()->json($foods);
    }

    
}
