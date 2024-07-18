<?php

use App\Http\Controllers\AssociacaoController;
use App\Http\Controllers\ParcelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'loginApi')->name('login_api');
});
Route::get('/', [HomeController::class,'home'])->name('home');
Route::match(['get','post'],'/associacao', [AssociacaoController::class,'associacao'])->name('associacao');
Route::match(['get','post'],'/parcelas', [ParcelasController::class,'parcelas'])->name('parcelas');
//Route::controller(AssociacaoController::class)->group(function () {
//    Route::get('/associacao', 'index')->name('associacao');
//    Route::post('/associacao', 'associacao')->name('associacao');
//});
//Route::controller(ParcelasController::class)->group(function () {
//    Route::get('/parcelas', 'index')->name('parcelas');
//    Route::post('/parcelas', 'parcelas')->name('parcelas');
//});
