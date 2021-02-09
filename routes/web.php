<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // ditambahkan juga
use phpDocumentor\Reflection\Types\True_;

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

Route::get('/', 'HomeController@index')
  ->name('home');
//untuk home disimpan di luar

Route::get('/detail/{slug}', 'DetailController@index')
  ->name('detail');

Route::post('/checkout/{id}', 'CheckoutController@process')
  ->name('checkout_process') //utk memproses data dr checkout
  ->middleware(['auth', 'verified']); //auth utk memastikan login atau tidak, verified bawaan laravel

Route::get('/checkout/{id}', 'CheckoutController@index')
  ->name('checkout')
  ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
  ->name('checkout-create')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/create/{detail_id}', 'CheckoutController@remove')
  ->name('checkout-remove')
  ->middleware('auth', 'verified');

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
  ->name('checkout-success')
  ->middleware('auth', 'verified');

Route::prefix('admin')
  ->namespace('Admin')
  // Admin sesuai dgn namespace yg ada pada Dashboardcontroller.php
  ->middleware(['auth', 'admin'])
  ->group(function () {
    Route::get('/', 'DashboardController@index')
      // masukkan nama controller@nama function
      ->name('dashboard');

    Route::resource('travel-package', 'TravelPackageController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('transaction', 'TransactionController');
  });

Auth::routes(['verify' => true]);
