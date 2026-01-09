<?php

use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\TenantController;
use Illuminate\Support\Facades\Route;

// House API routes
Route::get('/houses', [HouseController::class, 'index']);
Route::get('/houses/{id}', [HouseController::class, 'show']);
Route::delete('/houses/{id}', [HouseController::class, 'destroy']);

// Tenant API routes
Route::get('/tenants', [TenantController::class, 'index']);
Route::put('/tenants/{id}', [TenantController::class, 'update']);
Route::patch('/tenants/{id}', [TenantController::class, 'update']);
Route::delete('/tenants/{id}', [TenantController::class, 'destroy']);
