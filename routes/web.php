<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlanoController::class,'home'])->name('home');
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/loginApi', [UserController::class,'loginApi'])->name('login.api');
Route::match(['get','post'],'/associacao', [PlanoController::class,'associacao'])->name('associacao');
Route::post('/parcelas', [PlanoController::class,'parcelas'])->name('parcelas');

