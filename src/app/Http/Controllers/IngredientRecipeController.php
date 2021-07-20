<?php

namespace App\Http\Controllers;

use App\IngredientsRecipe;
use Illuminate\Http\Request;

class IngredientsRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientsRecipe = IngredientsRecipe::all();
        return $ingredientsRecipe;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientsRecipe = new IngredientsRecipe();
        $ingredientsRecipe->id_ingredients = $request['id_ingredients'];
        $ingredientsRecipe->id_recipes = $request['id_recipes'];
        $ingredientsRecipe->save();
        return  $ingredientsRecipe;
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
        /*$ingredientsRecipe = IngredientsRecipe::where('id',$request['id'])->first();
        $ingredientsRecipe->id_ingredients = $request['id_ingredients'];
        $ingredientsRecipe->id_recipes = $request['id_recipes'];
        $ingredientsRecipe->save();*/
        //METODO 2
        $ingredientsRecipe = IngredientsRecipe::where('id',$request['id'])->update(['id_ingredients'=>$request['id_ingredients'],'id_recipes'=>$request['id_recipes']]);
        return $ingredientsRecipe;
    }

    public function delete(Request $request)
    {
        $ingredientsRecipe = IngredientsRecipe::find($request['id']);
        $ingredientsRecipe->delete();
        return $ingredientsRecipe;
    }
}
