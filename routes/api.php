<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\FrontendController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('category_product', [FrontendController::class, 'getFood']);
Route::get('coupon_check', [FrontendController::class, 'coupon_check']);
Route::post('order_update', [OrderController::class, 'update']);
// Category Routes
Route::apiResource('categories', CategoryController::class);

// Food Routes
Route::apiResource('foods', FoodController::class);

// Coupon Routes
Route::apiResource('coupons', CouponController::class);

// Order Routes
Route::apiResource('orders', OrderController::class);

// User Routes
Route::apiResource('users', UserController::class);
