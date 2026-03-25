<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;

Route::resource('costumers', CostumerController::class);