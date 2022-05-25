<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('client.index');
})->name('landing');

Route::get('/about', function () {
    return view('client.about');
})->name('about');

Route::group(['prefix' => 'admin'], function() {

    Route::get('login', [AuthController::class, 'formLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth'], function() {
        Route::group(['prefix' => 'pesanan'], function() {
            Route::get('/', [CustomerController::class, 'index'])->name('admin.pesanan');
            Route::get('create', [CustomerController::class, 'create'])->name('admin.pesanan.create');
            Route::post('create', [CustomerController::class, 'store']);
            Route::get('{id}/edit', [CustomerController::class, 'edit'])->name('admin.pesanan.edit');
            Route::post('{id}/edit', [CustomerController::class, 'update']);
            Route::get('{id}/detail', [CustomerController::class, 'detail'])->name('admin.pesanan.detail');
            Route::get('{id}/delete', [CustomerController::class, 'delete'])->name('admin.pesanan.delete');
        });
    
        Route::group(['prefix' => 'pengiriman'], function() {
            Route::get('/', [OrderController::class, 'index'])->name('admin.pengiriman');
            Route::get('create', [OrderController::class, 'create'])->name('admin.pengiriman.create');
            Route::post('create', [OrderController::class, 'store']);
            Route::get('{id}/edit', [OrderController::class, 'edit'])->name('admin.pengiriman.edit');
            Route::post('{id}/edit', [OrderController::class, 'update']);
            Route::get('{id}/delete', [OrderController::class, 'delete'])->name('admin.pengiriman.delete');
        });
    
        Route::group(['prefix' => 'account'], function() {
            Route::get('/', [UserController::class, 'index'])->name('admin.account');
            Route::get('create', [UserController::class, 'create'])->name('admin.account.create');
            Route::post('create', [UserController::class, 'store']);
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('admin.account.edit');
            Route::post('{id}/edit', [UserController::class, 'update']);
            Route::get('{id}/delete', [UserController::class, 'delete'])->name('admin.account.delete');
        });
    });
});