<?php

use App\Http\Controllers\AksesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/offices', [AksesController::class,'getIndex']);
Route::get('/offices/{offices}', [AksesController::class,'getShow']);
Route::get('/officesCreateData', [AksesController::class,'createData']);
Route::get('/officesUpdateData', [AksesController::class,'updateData']);
Route::get('/officesDelete/{offices}', [AksesController::class,'deleteData']);

