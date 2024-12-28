<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FinanceController;

Route::get('/finances', [FinanceController::class, 'index'])->name('finances.index');
Route::post('/finances', [FinanceController::class, 'store'])->name('finances.store');
Route::get('/finances/{date}', [FinanceController::class, 'getByDate'])->name('finances.getByDate');

