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

Route::get('/', function(){ return redirect(route('customer.index')); });
Route::get('/customers', 'App\Http\Controllers\CustomerController@index')->name('customer.index');
Route::post('/customers/invoice', 'App\Http\Controllers\CustomerController@invoice')->name('customer.invoice');
Route::get('/customers/invoice-template', 'App\Http\Controllers\CustomerController@invoice_template')->name('customer.invoice_template');
