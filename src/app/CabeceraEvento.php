<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabeceraEvento extends Model
{
    public $table = "cabecera_eventos";
    /*public function ingredientsRecipe(){
        return $this->hasMany('App\IngredientsRecipe','id_recipes','id');
    }*/
}
/*$controller = app()->make('App\Http\Controllers\CocktailController');
app()->call([$controller, 'index'], [param1 => 321]);*/