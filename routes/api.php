<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\PortfolioHistoryController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {return $request->user();})->name('user.get');

    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.get');
    Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])->name('portfolios.show');
    Route::patch('/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.patch');

    Route::post('/portfolio-history', [PortfolioHistoryController::class, 'create'])->name('portfolio-history.create');
    Route::post('/portfolio-item', [PortfolioItemController::class, 'create'])->name('portfolio-item.create');
});
