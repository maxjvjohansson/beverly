<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


Route::view('/', 'index')->name('login')->middleware('guest');
Route::get('/login', LoginController::class);
Route::post('/login', LoginController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->middleware('can:manage-users')->name('users.updateRole');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // or do we want a page that confirms the logout to the user?
})->name('logout');
