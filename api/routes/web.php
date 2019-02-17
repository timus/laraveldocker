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

Route::post('api/receive', 'EventsController@store')->name('events.store');
Route::post('api/studentActivityReport', 'EventsController@studentActivityReport')->name('events.activity');
Route::get('api/getMaxActivityReport', 'EventsController@getMaxActivityReport')->name('events.max');
