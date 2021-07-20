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
Route::post('/users/index','UserController@index')->name('users.index');
Route::post('/users/store','UserController@store')->name('users.store');
Route::post('/users/update','UserController@update')->name('users.update');
Route::post('/users/delete','UserController@delete')->name('users.delete');
Route::post('/users/login','UserController@login')->name('users.login');
/*___________________________________
 |                                   | 
 |       Cocktail's API ROUTE        |
 |___________________________________|
*/
Route::post('/cocktail/index','CocktailController@index')->name('cocktail.index');
Route::post('/cocktail/store','CocktailController@store')->name('cocktail.store');
Route::post('/cocktail/update','CocktailController@update')->name('cocktail.update');
Route::post('/cocktail/delete','CocktailController@delete')->name('cocktail.delete');
Route::post('/cocktail/getAllRecipe','CocktailController@getAllRecipe')->name('cocktail.getAllRecipe');

/*___________________________________
 |                                   | 
 |     Ingredient's API ROUTE        |
 |___________________________________|
*/
Route::post('/ingredient/index','IngredientController@index')->name('ingredient.index');
Route::post('/ingredient/store','IngredientController@store')->name('ingredient.store');
Route::post('/ingredient/update','IngredientController@update')->name('ingredient.update');
Route::post('/ingredient/delete','IngredientController@delete')->name('ingredient.delete');
/*___________________________________
 |                                   | 
 | IngredientsRecipe's API ROUTE     |
 |___________________________________|
*/
Route::post('/ingredientsrecipe/index','IngredientsRecipeController@index')->name('ingredientsrecipe.index');
Route::post('/ingredientsrecipe/store','IngredientsRecipeController@store')->name('ingredientsrecipe.store');
Route::post('/ingredientsrecipe/update','IngredientsRecipeController@update')->name('ingredientsrecipe.update');
Route::post('/ingredientsrecipe/delete','IngredientsRecipeController@delete')->name('ingredientsrecipe.delete');
/*___________________________________
 |                                   | 
 |     Recipe's API ROUTE            |
 |___________________________________|
*/
Route::post('/cocktail/index','CocktailController@index')->name('cocktail.index');
Route::post('/cocktail/store','CocktailController@store')->name('cocktail.store');
Route::post('/cocktail/update','CocktailController@update')->name('cocktail.update');
Route::post('/cocktail/delete','CocktailController@delete')->name('cocktail.delete');
/*___________________________________
 |                                   | 
 |     TypeIngredient's API ROUTE    |
 |___________________________________|
*/
Route::post('/cocktail/index','CocktailController@index')->name('cocktail.index');
Route::post('/cocktail/store','CocktailController@store')->name('cocktail.store');
Route::post('/cocktail/update','CocktailController@update')->name('cocktail.update');
Route::post('/cocktail/delete','CocktailController@delete')->name('cocktail.delete');