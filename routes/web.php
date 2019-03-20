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

Route::get('/','DatatablesController@getIndex');
Route::get('/get_data','DatatablesController@getData')->name('datatables.data');
Route::get('/get_stats','DatatablesController@getStats');
Route::get('/chart','DatatablesController@getChart');
Route::get('/download_csv','DatatablesController@downloadCSV');