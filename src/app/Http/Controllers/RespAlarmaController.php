<?php

namespace App\Http\Controllers;

use App\RespAlarma;
use Illuminate\Http\Request;

class RespAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = RespAlarma::all();
        return response()->json(['headers'=>$header]);
    }
}
