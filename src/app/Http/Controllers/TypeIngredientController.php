<?php

namespace App\Http\Controllers;

use App\TypeIngredient;
use Illuminate\Http\Request;

class TypeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeIngredient = TypeIngredient::all();
        return $typeIngredient;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeIngredient = new TypeIngredient();
        $typeIngredient->name = $request['name'];
        $typeIngredient->save();
        return  $typeIngredient;
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
        /*$typeIngredient = TypeIngredient::where('id',$request['id'])->first();
        $typeIngredient->name = $request['name'];
        $typeIngredient->save();*/
        //METODO 2
        $typeIngredient = TypeIngredient::where('id',$request['id'])->update(['name'=>$request['name']]);
        return $typeIngredient;
    }

    public function delete(Request $request)
    {
        $typeIngredient = TypeIngredient::find($request['id']);
        $typeIngredient->delete();
        return $typeIngredient;
    }
}
