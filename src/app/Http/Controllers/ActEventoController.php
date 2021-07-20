<?php

namespace App\Http\Controllers;

use App\ActEvento;
use Illuminate\Http\Request;

class ActEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actEvento = ActEvento::all();
        return $actEvento;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actEvento = new ActEvento();
        $actEvento->name = $request['name'];
        $actEvento->degrees = $request['degrees'];
        $actEvento->save();
        return  $actEvento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //METODO 1
        $actEvento = ActEvento::where('id',$request['id'])->first();
        $actEvento->name = $request['name'];
        $actEvento->degrees = $request['degrees'];
        $actEvento->save();
        //METODO 2
        //$actEvento = ActEvento::where('id',$request['id'])->update(['name'=>$request['name'],'degrees'=>$request['degrees']]);
        return $actEvento;
    }

    public function delete(Request $request)
    {
        $actEvento = ActEvento::find($request['id']);
        $actEvento->delete();
        return $actEvento;
    }

    public function getAllRecipe()
    {
        //$actEventos = ActEvento::find([$request['id']]);
        $actEventos = ActEvento::all();
        foreach ($actEventos as $actEvento) {
            $recipes = $actEvento->ActEventoRecipe()->get();
            foreach ($recipes as $recipe) {
                $ingredientRecipes = $recipe->ingredientsRecipe()->get();
                foreach ($ingredientRecipes as $ingredientRecipe) {
                    $ingredientRecipe['Ingredient'] = $ingredientRecipe->ingredients()->get();
                }
                $recipe['IngredientRecipe'] = $ingredientRecipes;
            }
            $actEvento['Recipe'] = $recipes;
        }
        return $actEventos;
    }
}
/*
$controller = app()->make('App\Http\Controllers\ActEventoController');
app()->call([$controller, 'getAllRecipe']);
*/
