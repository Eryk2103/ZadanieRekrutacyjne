<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


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
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['role:user']], function() {
    Route::get('/customers/{id}', [CustomerController::class, 'getById']);
    Route::put('/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers/{id}', [CustomerController::class, 'remove']);
    Route::get('/customers', [CustomerController::class, 'getAll']);
});
Route::group(['middleware' => ['role:admin']], function() {
    Route::post('/customers', [CustomerController::class, 'create']);
});


