<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BarangsController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("login", [AuthController::class, 'login']);

Route::post("register", [AuthController::class, 'register']);

Route::group(["middleware"=>"auth.jwt"], function(){
    Route::post("logout",[AuthController::class, 'logout']);
    Route::resource("customers", CustomersController::class);
    Route::resource("barang", BarangsController::class);
    // Route::get("customers",[CustomersController::class, 'index']);
});
// Route::resource("customers", CustomersController::class);

// Route::post("customers", [CustomersController::class, 'store']);
// Route::get("customers", [CustomersController::class, 'index']);
// Route::put("customers", [CustomersController::class, 'update']);
// Route::delete("customers", [CustomersController::class, 'destroy']);