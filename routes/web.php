<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/login', [LoginController::class, '__invoke']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // or do we want a page that confirms the logout to the user?
})->name('logout');
