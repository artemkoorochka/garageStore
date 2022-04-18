<?php

use Illuminate\Support\Facades\Route,
    App\Http\Controllers\ProductController,
    App\Http\Controllers\CategoryController,
    App\Http\Controllers\ProductRestContoller,
    App\Http\Controllers\CatalogRestContoller,
    Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect("/", "/catalog");
Route::get("/catalog", [ProductController::class, "catalogList"])->name("catalog");

Route::resource("/admin/products", ProductController::class);
Route::get('/rest/products', [ProductRestContoller::class, "list"])->name('rest.products');

Route::get('/admin/categories', [CategoryController::class, "index"]);
Route::post('/admin/categories',[CategoryController::class, "store"])->name('categories.store');
Route::get('/admin/categories/{category}',[CategoryController::class, "edit"])->name('categories.edit');
Route::patch('/admin/categories/{category}',[CategoryController::class, "update"])->name('categories.update');
Route::delete('/admin/categories/{category}',[CategoryController::class, "destroy"])->name('categories.destroy');
Route::get('/rest/categories', [CatalogRestContoller::class, "list"])->name('rest.categories');
