<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;

Route::get('/welcome', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login.index');
Route::post('/login', [AuthController::class, 'logprocess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register.index');
Route::post('/register', [AuthController::class, 'regprocess'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/{user}/delete', [AuthController::class, 'destroy'])->name('delete');

Route::middleware('isLogin')->group(function() {
    Route::get('/', [BarangController::class, 'home'])->name('start');
    Route::get('/homepage', [BarangController::class, 'home'])->name('home.index');
    Route::get('/homepage/tambah', [BarangController::class, 'homeadd'])->name('home.add');
    Route::post('/homepage/process', [BarangController::class, 'homeprocess'])->name('home.process');
    Route::get('/homepage/{barang}', [BarangController::class, 'homedetail'])->name('home.detail');
    Route::put('/homepage/{barang}/edit', [BarangController::class, 'homeedit'])->name('home.edit');
    Route::delete('/homepage/{barang}/delete', [BarangController::class, 'homedelete'])->name('home.delete');

    Route::get('/laporankehilangan', [BarangController::class, 'hilang'])->name('hilang.index');
    Route::get('/laporankehilangan/tambah', [BarangController::class, 'hiadd'])->name('hilang.add');
    Route::post('/laporankehilangan/process', [BarangController::class, 'hiprocess'])->name('hilang.process');
    Route::get('/laporankehilangan/{barang}', [BarangController::class, 'hidetail'])->name('hilang.detail');
    Route::put('/laporankehilangan/{barang}/edit', [BarangController::class, 'hiedit'])->name('hilang.edit');
    Route::delete('/laporankehilangan/{barang}/delete', [BarangController::class, 'hidelete'])->name('hilang.delete');
});