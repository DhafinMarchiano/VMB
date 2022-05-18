<?php

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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/pesanan', function () {
        return view('admin.pesanan.index');
    })->name('admin.pesanan');
    Route::get('/pengiriman/create', function () {
        return view('admin.pengiriman.create');
    })->name('admin.pengiriman.create');
    Route::get('/pengiriman', function () {
        return view('admin.pengiriman.index');
    })->name('admin.pengiriman');
});