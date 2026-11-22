<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ProfileController;

// Reviews APIs
Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::get('/photographers/{id}/reviews', [
    ReviewController::class,
    'photographerReviews'
]);

Route::post('/reviews', [ReviewController::class, 'store']);

// User Profiles APIs
Route::get('/profiles/{id}', [
    ProfileController::class,
    'show'
]);

Route::put('/profiles/{id}', [
    ProfileController::class,
    'update'
]);

// Photographer Profile API
Route::get('/photographers/{id}/profile', [
    ProfileController::class,
    'photographerProfile'
]);
