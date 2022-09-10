<?php

use Illuminate\Http\Request;
use App\Http\Controllers\OrderAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders',[OrderAPIController::class,'getOrders']);
// Route::post('/place-order',[OrderAPIController::class,'createOrder']);
// Route::get('sync-orders-to-circle/{id}',[OrderAPIController::class,'syncOrderToCircle']);


