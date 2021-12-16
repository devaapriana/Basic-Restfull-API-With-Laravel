<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/list-order', function () {
    return view('listorder');
});

Route::get('/auth', [AuthController::class, 'auth']);
Route::get('/products', [ProductController::class, 'findAll']);
Route::get('/products/{produk}', [ProductController::class, 'findOne']);


Route::get('/customers', [CustomerController::class, 'findAll']);


Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'findAll']);
Route::get('/orders/{order}', [OrderController::class, 'findOne']);
Route::patch('/orders/{order}', [OrderController::class, 'update']);
Route::delete('/orders/{order}', [OrderController::class, 'delete']);
