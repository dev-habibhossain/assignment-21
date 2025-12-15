<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController; // <-- Ensure this is present
use App\Http\Controllers\AuthorController; // <-- Ensure this is present

// --- Public Routes ---
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');

// --- Auth Routes ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'userLogin'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/submit', [AuthController::class, 'userRegister'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logOut'])->middleware('auth')->name('custom.logout');

// --- Blog & Category Public Routes ---
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/blogs/category/{category}', [BlogController::class, 'byCategory'])->name('blogs.byCategory');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');


// --- Admin Dashboard Group (Middleware: auth, admin) ---
Route::prefix('admin/dashboard')
    ->middleware(['auth', 'admin']) 
    ->group(function () {
        
        // Admin Dashboard & Profile
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');

        // Posts management
        Route::get('/posts', [AdminController::class, 'postsIndex'])->name('admin.posts.index');
        Route::get('/posts/create', [AdminController::class, 'postsCreate'])->name('admin.posts.create');
        Route::post('/posts/submit', [AdminController::class, 'store'])->name('admin.posts.store'); // <-- This is the route used for creating the blog
        Route::get('/posts/edit/{id}', [AdminController::class, 'postsEdit'])->name('admin.posts.edit'); 
        Route::put('/posts/{id}', [AdminController::class, 'update'])->name('admin.posts.update');
        Route::delete('/posts/{id}', [AdminController::class, 'destroy'])->name('admin.posts.destroy');

        // Banner management
        Route::get('/banner', [AdminController::class, 'bannerIndex'])->name('admin.banner.index');
        Route::get('/banner/create', [AdminController::class, 'bannerCreate'])->name('admin.banner.create');
        Route::post('/banner', [AdminController::class, 'bannerStore'])->name('admin.banner.store');
        Route::put('/banner/{id}', [AdminController::class, 'bannerStore'])->name('admin.banner.update');

        // Categories management
        Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
Route::get('/categories/create', [AdminController::class, 'categoriesCreate'])->name('admin.categories.create');
Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');

// *** NEW: Edit Form ***
Route::get('/categories/{id}/edit', [AdminController::class, 'categoriesEdit'])->name('admin.categories.edit'); 
// *** NEW: Update Submission ***
Route::put('/categories/{id}', [AdminController::class, 'categoriesUpdate'])->name('admin.categories.update'); 
// *** NEW: Delete ***
Route::delete('/categories/{id}', [AdminController::class, 'categoriesDestroy'])->name('admin.categories.destroy');
        
});

// --- Author Dashboard Group (Middleware: auth, author) ---
Route::prefix('author/dashboard')
    ->middleware(['auth', 'author']) 
    ->group(function () {
        
        // Author Dashboard & Profile
        Route::get('/', [AuthorController::class, 'index'])->name('author.home');
        Route::get('/profile', [AuthorController::class, 'profile'])->name('author.profile');
        Route::get('/profile/edit', [AuthorController::class, 'editProfile'])->name('author.profile.edit');

        // Posts management
        Route::get('/posts', [AuthorController::class, 'postsIndex'])->name('author.posts.index');
        Route::get('/posts/create', [AuthorController::class, 'postsCreate'])->name('author.posts.create');
        Route::get('/posts/edit/{id}', [AuthorController::class, 'postsEdit'])->name('author.posts.edit');
        
        // If authors can also submit posts, you would add a route here:
        // Route::post('/posts/submit', [AuthorController::class, 'store'])->name('author.posts.store');
});