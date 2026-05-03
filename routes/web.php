<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard route
Route::get('/summary', [SummaryController::class, 'index'])->name('summary');

//Costumer, Products, Order and user routes
Route::resource('costumers', CostumerController::class);
Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);

//Evidence routes
Route::get('orders/{order_id}/evidences', [EvidenceController::class, 'index'])->name('evidences.index');
Route::get('orders/{order_id}/evidences/create', [EvidenceController::class, 'create'])->name('evidences.create');
Route::post('orders/{order_id}/evidences', [EvidenceController::class, 'store'])->name('evidences.store');
Route::get('evidences/{id}', [EvidenceController::class, 'show'])->name('evidences.show');
Route::delete('evidences/{id}', [EvidenceController::class, 'destroy'])->name('evidences.destroy');
Route::put('orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

require __DIR__.'/auth.php';
