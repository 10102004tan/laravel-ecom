<?php

use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', AdminDashboardController::class)->name("dashboard");
    Route::resource('categories', CategoryController::class);
    Route::get('brands', App\Livewire\Admin\Brand\Index::class);
});
