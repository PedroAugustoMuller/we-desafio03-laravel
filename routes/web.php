<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanosController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'loginApi'])->name('login.api');
Route::get('/', [PlanosController::class,'home'])->name('home');
Route::get('/associacao', [PlanosController::class,'associacao'])->name('associacao');

