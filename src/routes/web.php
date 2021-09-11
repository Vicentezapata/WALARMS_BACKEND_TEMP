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
/*___________________________________
 |                                   | 
 |       User's API ROUTE        |
 |___________________________________|
*/
Route::get('/users/index','UserController@index')->name('users.index');
Route::post('/users/store','UserController@store')->name('users.store');
Route::post('/users/update','UserController@update')->name('users.update');
Route::post('/users/delete','UserController@delete')->name('users.delete');
Route::post('/users/login','UserController@login')->name('users.login');

/*___________________________________
 |                                   | 
 |       Header's API ROUTE        |
 |___________________________________|
*/
Route::get('/header/index','CabeceraEventoController@index')->name('header.index');

/*___________________________________
 |                                   | 
 |       Activities's API ROUTE        |
 |___________________________________|
*/
Route::post('/activity/store','ActividadController@store')->name('activity.store');

