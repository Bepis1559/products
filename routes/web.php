<?php

use App\Http\Controllers\AdminProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// auth middleware to protect product routes
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::middleware('checkProductOwnership')->group(function () {
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Admin User Routes
    Route::get('/users', [UserController::class, 'users'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('admin.users.edit');
    Route::get('/users/create', [UserController::class, 'createUser'])->name('admin.users.create');
    Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('admin.users.update');
    Route::post('/users', [UserController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('admin.users.destroy');

    // Admin Product Routes
    Route::get('/products', [AdminProductsController::class, 'index'])->name('admin.products.index');

    // Admin Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    // Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

// Built-in auth routes
Auth::routes();

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Home route after logging in
Route::get('/home', [HomeController::class, 'index'])->name('home');
