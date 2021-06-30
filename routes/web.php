<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('index');})->name('index');


Route::get('admin' , function (){
    return view('admin.master');
});
Route::prefix('Product')->group(function () {
    Route::get('/' , [ProductController::class , 'index'])->name('Product.show');
    Route::get('create' , [ProductController::class , 'create'])->name('Product.create');
    Route::post('create' , [ProductController::class , 'store'])->name('Product.store');
    Route::get('{id}/detail' , [ProductController::class , 'detail'])->name('Product.detail');
    Route::get('{id}/edit' , [ProductController::class , 'edit'])->name('Product.edit');
    Route::post('{id}/update' , [ProductController::class , 'update'])->name('Product.update');
    Route::get('delete' , [ProductController::class , 'delete'])->name('Product.delete');
});
