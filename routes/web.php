<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanoController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/loginApi', [LoginController::class,'loginApi'])->name('login.api');
Route::get('/', [PlanoController::class,'home'])->name('home');
Route::post('/associacao', [PlanoController::class,'associacao'])->name('associacao');
Route::get('/parcelas', [PlanoController::class,'parcelas'])->name('parcelas');

