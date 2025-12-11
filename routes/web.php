<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

Route::get('/', function () { 
    return view('home'); 
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

use App\Http\Controllers\AdminController;

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');

    // Posts management
    Route::get('/posts', [AdminController::class, 'postsIndex'])->name('admin.posts.index');
    Route::get('/posts/create', [AdminController::class, 'postsCreate'])->name('admin.posts.create');
    Route::get('/posts/{id}/edit', [AdminController::class, 'postsEdit'])->name('admin.posts.edit');

    // Banner management
    Route::get('/banner', [AdminController::class, 'bannerIndex'])->name('admin.banner.index');
    Route::get('/banner/create', [AdminController::class, 'bannerCreate'])->name('admin.banner.create');
    Route::post('/banner', [AdminController::class, 'bannerStore'])->name('admin.banner.store');
    Route::put('/banner/{id}', [AdminController::class, 'bannerStore'])->name('admin.banner.update');
    
});
