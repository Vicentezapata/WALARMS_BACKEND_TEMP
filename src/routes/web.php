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
Route::get('/users/indexForAproveEvent','UserController@indexForAproveEvent')->name('users.indexForAproveEvent');
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
Route::get('/respalarms/index','RespAlarmaController@index')->name('header.index');

/*___________________________________
 |                                   | 
 |       Activities's API ROUTE      |
 |___________________________________|
*/
Route::post('/activity/store','ActividadController@store')->name('activity.store');
Route::post('/activity/index','ActividadController@index')->name('activity.index');
Route::post('/activity/indexListActivities','ActividadController@indexListActivities')->name('activity.indexListActivities');
Route::post('/activity/indexListActivitiesByDate','ActividadController@indexListActivitiesByDate')->name('activity.indexListActivitiesByDate');
Route::post('/activity/indexListActivitiesByFilter','ActividadController@indexListActivitiesByFilter')->name('activity.indexListActivitiesByFilter');
Route::post('/activity/indexForAproveEvent','ActividadController@indexForAproveEvent')->name('activity.indexForAproveEvent');
Route::post('/activity/indexApprove','ActividadController@indexApprove')->name('activity.indexApprove');
Route::post('/activity/indexAllApprove','ActividadController@indexAllApprove')->name('activity.indexAllApprove');
Route::post('/activity/detailByDate','ActividadController@detailByDate')->name('activity.detailByDate');
Route::post('/activity/delete','ActividadController@delete')->name('activity.delete');
Route::post('/activity/update','ActividadController@update')->name('activity.update');
Route::post('/activity/approve','ActividadController@approve')->name('activity.approve');
Route::post('/activity/updateForApprove','ActividadController@updateForapprove')->name('activity.updateForApprove');
Route::post('/activity/updateByNotification','ActividadController@updateByNotification')->name('activity.updateByNotification');
Route::post('/activity/updateFinishEvent','ActividadController@updateFinishEvent')->name('activity.updateFinishEvent');
/*___________________________________
 |                                   | 
 |        Bitacora's API ROUTE       |
 |___________________________________|
*/
Route::post('/bitacora/index','BitacoraAlarmaController@index')->name('bitacora.index');
Route::post('/bitacora/indexByDate','BitacoraAlarmaController@indexByDate')->name('bitacora.indexByDate');
Route::post('/bitacora/indexByFilter','BitacoraAlarmaController@indexByFilter')->name('bitacora.indexByFilter');
Route::post('/bitacora/indexByActivitySelected','BitacoraAlarmaController@indexByActivitySelected')->name('bitacora.indexByActivitySelected');
/*___________________________________
 |                                   | 
 |        OFFLINE's API ROUTE       |
 |___________________________________|
*/
Route::post('/offline/datauser','ActividadController@getalldatauser')->name('activity.getalldatauser');
Route::post('/offline/update','ActividadController@updateCloudDatabase')->name('activity.updateCloudDatabase');