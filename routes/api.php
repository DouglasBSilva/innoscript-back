<?php

use Illuminate\Http\Request;

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
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: GET,HEAD,POST,PUT,PATCH,OPTIONS,DELETE");
//header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");


Route::apiResource('products','ProductsController');
Route::apiResource('carts','CartsController');
Route::apiResource('customers','CustomersController');

