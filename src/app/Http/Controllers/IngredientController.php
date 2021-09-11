<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return $ingredients;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request['name'];
        $ingredient->id_type_ingredients = $request['id_type_ingredients'];
        $ingredient->save();
        return  $ingredient;
        
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
        /*$ingredient = Ingredient::where('id',$request['id'])->first();
        $ingredient->name = $request['name'];
        $ingredient->id_type_ingredients = $request['id_type_ingredients'];
        $ingredient->save();*/
        //METODO 2
        $ingredient = Ingredient::where('id',$request['id'])->update(['name'=>$request['name'],'id_type_ingredients'=>$request['id_type_ingredients']]);
        return $ingredient;
    }

    public function delete(Request $request)
    {
        $ingredient = Ingredient::find($request['id']);
        $ingredient->delete();
        return $ingredient;
    }
}
