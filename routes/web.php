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

Route::get('/', 'CalculatorController@index')->name('home');
Route::get('calculations', 'CalculationController@index')->name('calculations.index');

Route::post('calculate', 'CalculatorController@calculate')->name('calculator.calculate');

Route::resource('rates', 'RateController');
Route::resource('currencies', 'CurrencyController');
