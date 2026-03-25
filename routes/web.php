<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\OrderController;

Route::resource('costumers', CostumerController::class);
Route::resource('orders', OrderController::class);