<?php

use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('dashboard', AdminDashboardController::class);
});
