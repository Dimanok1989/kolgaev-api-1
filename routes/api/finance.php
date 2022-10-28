<?php

use App\Http\Controllers\Finance\FinanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FinanceController::class, "index"])->name('api.finance');
Route::get('/{id}/get', [FinanceController::class, "get"])->name('api.finance.get');
Route::put('/create', [FinanceController::class, "create"])->name('api.finance.create');
Route::put('/save', [FinanceController::class, "save"])->name('api.finance.save');
