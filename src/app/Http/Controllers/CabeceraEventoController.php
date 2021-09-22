<?php

namespace App\Http\Controllers;
use App\CabeceraEvento;
use Illuminate\Http\Request;

class CabeceraEventoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = CabeceraEvento::all();
        return response()->json(['headers'=>$header]);
    }

}
