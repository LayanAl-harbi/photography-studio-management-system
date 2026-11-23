<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Payments Endpoints
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);

// Dashboard Endpoints
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
Route::get('/dashboard/summary', [DashboardController::class, 'summary']);