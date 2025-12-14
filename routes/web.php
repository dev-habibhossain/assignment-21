<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'loginPost'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

use App\Http\Controllers\AdminController;

// Admin routes
Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->middleware('auth')->name('admin.home');
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

    // Categories management
    Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminController::class, 'categoriesCreate'])->name('admin.categories.create');
    Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');
    
});
use App\Http\Controllers\AuthorController;

// Author routes
Route::prefix('author/dashboard')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->middleware('auth')->name('author.home');
    Route::get('/profile', [AuthorController::class, 'profile'])->name('author.profile');
    Route::get('/profile/edit', [AuthorController::class, 'editProfile'])->name('author.profile.edit');

    // Posts management
    Route::get('/posts', [AuthorController::class, 'postsIndex'])->name('author.posts.index');
    Route::get('/posts/create', [AuthorController::class, 'postsCreate'])->name('author.posts.create');
    Route::get('/posts/{id}/edit', [AuthorController::class, 'postsEdit'])->name('author.posts.edit');
});
