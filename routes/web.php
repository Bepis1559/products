<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
Route::middleware(['auth'])->group(function () {

    // products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    // Display a form for creating a new product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Store a new product in the database
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Display details of a specific product
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    // Display a form for editing a specific product
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Update a specific product in the database
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

    // Delete a specific product from the database
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// built-in auth
Auth::routes();

// welcome page
Route::get('/', function () {
    return view('welcome');
});
// home = after logging in 
Route::get('/home', [HomeController::class, 'index'])->name('home');
