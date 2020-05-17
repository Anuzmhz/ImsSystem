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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('master/vendor','Master\VendorController');
Route::get('vendor/datatable','Master\VendorController@datatable')->name('vendor/datatable');

Route::resource('master/product', 'Master\ProductController');
Route::get('product/datatable','Master\ProductController@datatable')->name('product/datatable');

Route::get('product/datatableTrash','Master\ProductController@datatableTrash')->name('product/datatableTrash');

Route::post('product/undoTrash/{id}', 'Master\ProductController@undoTrash')->name('product/undoTrash/{id}');

Route::resource('transaction/purchase-order','Transaction\PurchaseController');
