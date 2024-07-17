<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanoController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class,'login'])->name('login');
Route::get('/logout', [UserController::class,'logout'])->name('logout');
Route::post('/loginApi', [UserController::class,'loginApi'])->name('login.api');
Route::get('/', [PlanoController::class,'home'])->name('home');
Route::match(['get','post'],'/associacao', [PlanoController::class,'associacao'])->name('associacao');
Route::match(['get','post'],'/parcelas', [PlanoController::class,'parcelas'])->name('parcelas');

