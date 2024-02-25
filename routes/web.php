<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return inertia('Frontend/Index');
//});

Route::get('/', [HomePageController::class, 'index']);
Route::get('/shop', [HomePageController::class, 'shop']);

//dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Slider Controller
Route::get('/slider-show', [SliderController::class, 'index'])->name('slider.show');
Route::get('/slider-create', [SliderController::class, 'create'])->name('slider.create');
Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider-edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::post('/slider-delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');

//Brand Controller
Route::get('/brand-show', [BrandController::class, 'index'])->name('brand.show');
Route::get('/brand-create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand-store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand-edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand-update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::post('/brand-delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

//Category Controller
Route::get('/category-show', [CategoryController::class, 'index'])->name('category.show');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

//Product Controller
Route::get('/product-show', [ProductController::class, 'index'])->name('product.show');
Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
