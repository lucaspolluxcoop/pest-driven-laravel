<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {return $request->user();})->name('user.get');

    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.get');
    Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])->name('portfolios.show');
    Route::patch('/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.patch');
});
