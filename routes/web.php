<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () { return view('welcome');})->name('home');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/public-portfolios', [PortfolioController::class, 'public'])->name('public-portfolios.get');
