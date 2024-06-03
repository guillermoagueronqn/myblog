<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('show');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('edit');

    //nuevo para categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('indexCategory');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('createCategory');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//nuevo para abm categories
Route::resource('categories', CategoryController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';