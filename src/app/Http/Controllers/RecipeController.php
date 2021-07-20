<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe = Recipe::all();
        return $recipe;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->id_cocktail = $request['id_cocktail'];
        $recipe->description = $request['description'];
        $recipe->measure = $request['measure'];
        $recipe->save();
        return  $recipe;
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
        /*$recipe = Recipe::where('id',$request['id'])->first();
        $recipe->id_cocktail = $request['id_cocktail'];
        $recipe->description = $request['description'];
        $recipe->measure = $request['measure'];
        $recipe->save();*/
        //METODO 2
        $recipe = Recipe::where('id',$request['id'])->update(['id_cocktail'=>$request['id_cocktail'],'description'=>$request['description'],'measure'=>$request['measure']]);
        return $recipe;
    }

    public function delete(Request $request)
    {
        $recipe = Recipe::find($request['id']);
        $recipe->delete();
        return $recipe;
    }
}
