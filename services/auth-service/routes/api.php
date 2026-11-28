<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\ProfileHandoffController;
use App\Http\Controllers\API\Admin\PhotographerController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\ReviewsIntegrationController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/profile-handoff', [ProfileHandoffController::class, 'issue'])
    ->middleware(['auth:sanctum', 'role:client,photographer']);
Route::post('/profile-handoff/redeem', [ProfileHandoffController::class, 'redeem']);

Route::get('/user', function (Request $request) {
    return response()->json([
        'id' => $request->user()->id,
        'name' => $request->user()->name,
        'email' => $request->user()->email,
        'role' => $request->user()->role,
        'is_active' => $request->user()->is_active,
    ]);
})->middleware('auth:sanctum');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::post('/admin/photographers', [PhotographerController::class, 'store'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::get('/admin/photographers', [PhotographerController::class, 'index'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::patch('/admin/photographers/{id}/status', [PhotographerController::class, 'updateStatus'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::patch('/admin/users/{id}/role', [UserController::class, 'updateRole'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::patch('/admin/users/{id}/status', [UserController::class, 'updateStatus'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::get('/admin/reviews', [ReviewsIntegrationController::class, 'index'])
    ->middleware(['auth:sanctum', 'role:admin']);
