<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');
Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.get')->middleware('auth:sanctum');
