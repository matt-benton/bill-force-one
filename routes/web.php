<?php

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

Route::resource('accounts', 'AccountController');

Route::prefix('accounts/{accountId}')->group(function () {
    Route::get('bills/reset', 'BillController@resetMonthlyBills')->name('bills.reset');
    Route::resource('bills', 'BillController');
    Route::put('bills/{bill}/toggle', 'BillController@togglePaidStatus');
});
