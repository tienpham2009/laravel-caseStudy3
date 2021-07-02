<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::get('/', function (){
    return redirect()->route('user.dashboard');
})->name('home');


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
Route::get('/login',[AuthController::class,'showFormLogin'])->name('auth.showFormLogin');
Route::get('/register',[AuthController::class,'showFormRegister'])->name('auth.showFormRegister');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/register',[AuthController::class,'register'])->name('auth.register');

Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('auth.showForgetPassword');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('auth.forgetPassword');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('auth.showFormResetPassword');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('auth.resetPassword');

Route::middleware('auth')->group(function (){
    Route::get('dashboard',function (){
        return view('index');
    })->name('user.dashboard');
    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
});


