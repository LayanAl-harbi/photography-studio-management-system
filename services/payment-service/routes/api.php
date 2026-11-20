<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Payments & Dashboard Endpoints
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/dashboard/stats', [PaymentController::class, 'getStats']);
Route::get('/dashboard/summary', [PaymentController::class, 'getSummary']);