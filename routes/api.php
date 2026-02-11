<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\PassengerRideController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('passenger')->group(function () {
    Route::post('/rides', [PassengerRideController::class, 'store']);
    Route::post('/rides/{ride}/approve-driver', [PassengerRideController::class, 'approveDriver']);
    Route::post('/rides/{ride}/complete', [PassengerRideController::class, 'completeRide']);
});

Route::prefix('driver')->group(function () {
    Route::post('/location', [DriverController::class, 'updateLocation']);
    Route::get('/rides/nearby', [DriverController::class, 'nearbyRides']);
    Route::post('/rides/{ride}/request', [DriverController::class, 'requestRide']);
    Route::post('/rides/{ride}/complete', [DriverController::class, 'completeRide']);
});
