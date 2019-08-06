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
Route::get('/invoices', "InvoicesController@getInvoices");
Route::get('/accounts', "AccountController@getAccounts");
Route::get('/transfer', 'TransferController@getAllTransfer');
Route::post('/transfer', 'TransferController@makeTransfer');
