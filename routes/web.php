<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

// Houses routes
Route::get('/', [HouseController::class, 'index'])->name('houses.index');
Route::get('/houses/{id}/edit', [HouseController::class, 'edit'])->name('houses.edit');
Route::put('/houses/{id}', [HouseController::class, 'update'])->name('houses.update');

// Tenants routes
Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
Route::put('/tenants/{id}', [TenantController::class, 'update'])->name('tenants.update');
Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');