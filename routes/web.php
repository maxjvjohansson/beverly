<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::view('/', 'index')->name('login')->middleware('guest');
Route::post('/login', LoginController::class);
Route::get('/dashboard', DashboardController::class)->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // or do we want a page that confirms the logout to the user?
})->name('logout');
