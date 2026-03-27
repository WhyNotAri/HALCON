<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EvidenceController;

//Oostumer and Order routes
Route::resource('costumers', CostumerController::class);
Route::resource('orders', OrderController::class);

//Evidence routes
Route::get('orders/{order_id}/evidences', [EvidenceController::class, 'index'])->name('evidences.index');
Route::get('orders/{order_id}/evidences/create', [EvidenceController::class, 'create'])->name('evidences.create');
Route::post('orders/{order_id}/evidences', [EvidenceController::class, 'store'])->name('evidences.store');
Route::get('evidences/{id}', [EvidenceController::class, 'show'])->name('evidences.show');
Route::delete('evidences/{id}', [EvidenceController::class, 'destroy'])->name('evidences.destroy');
Route::put('orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
