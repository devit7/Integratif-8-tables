<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductLinesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('1201220030/public')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/getAllUsers', [AuthController::class,'getAllUsers']);

    Route::apiResource('/offices', OfficesController::class)->middleware('auth:sanctum');
    Route::apiResource('/payments', PaymentsController::class);
    Route::apiResource('/productlines', ProductLinesController::class);
});

