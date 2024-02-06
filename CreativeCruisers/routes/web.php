<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('customise', function () {
    return view('customise');
});

Route::get('product_page', function () {
    return view('product_page');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('registration', function () {
    return view('registration');
});

Route::get('admin_add', function () {
    return view('admin_add');
});

Route::get('checkout', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::get('cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('productDetails');
Route::get('product_page', [ProductController::class, 'show'])->name('product_page');


Route::get('/admin_add', [ProductController::class, 'add'])->name('admin_add');
Route::post('/admin_add', [ProductController::class, 'addPost'])->name('add.post');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product_page', [ProductController::class, 'show'])->name('product_page');

Route::get('/products', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/category', [ProductController::class, 'showByCategory'])->name('products.showByCategory');

Route::get('/admin/home',[ProductController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/admin_add', [ProductController::class, 'add'])->name('admin_add');
Route::get('/admin/home', [ProductController::class, 'index'])->name('admin.home');
Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/admin_edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');




