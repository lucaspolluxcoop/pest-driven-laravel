<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('welcome');})->name('home');
Route::post('/login', [AuthController::class, 'authenticate'])->name('home');
