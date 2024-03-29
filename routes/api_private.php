<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function() {

    Route::get('brand', [BrandController::class, 'index']);

    Route::prefix('user')->group(function() {
        Route::post('assignCar', [UserController::class, 'assignCar']);
        Route::post('unassignCar', [UserController::class, 'unassignCar']);
        Route::get('{id}/cars', [UserController::class, 'carsByUser']);    
    });
    Route::apiResource('user', UserController::class);

    Route::apiResource('car', CarController::class);

});