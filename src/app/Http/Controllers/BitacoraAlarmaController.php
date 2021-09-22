<?php

namespace App\Http\Controllers;

use App\BitacoraAlarma;
use Illuminate\Http\Request;
use DB;

class BitacoraAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idUser   = $request['idUser'];
        $bitacora = DB::select("SELECT * from bitacora_alarmas, users,act_eventos where act_eventos.idActividad in (SELECT id FROM actividades where idUser = ".$idUser." or participantes like '%".$idUser."%') and bitacora_alarmas.idUser = users.id and bitacora_alarmas.idEvento = act_eventos.id");
        return response()->json(['logs'=>$bitacora]);
    }

    public function indexByDate(Request $request)
    {
        $conditional   = $request['conditional'];
        $sdate   = $request['sdate'];
        $bitacora = DB::select("SELECT * from bitacora_alarmas, users WHERE bitacora_alarmas.idUser = users.id ".$conditional." AND fecha LIKE '".$sdate."'");
        return response()->json(['logs'=>$bitacora]);
    }

    public function indexByFilter(Request $request)
    {
        $conditional = $request['conditional'];
        $sdate       = $request['sdate'];
        $status      = $request['status'];
        $bitacora = DB::select("SELECT * from bitacora_alarmas, users WHERE bitacora_alarmas.idUser = users.id ".$conditional." AND fecha LIKE '".$sdate."%' AND estado LIKE '%".$status."%'");
        return response()->json(['logs'=>$bitacora]);
    }

    public function indexByActivitySelected(Request $request)
    {
        $id = $request['id'];
        $bitacora = DB::select("SELECT * from bitacora_alarmas  WHERE bitacora_alarmas.idEvento = ".$id);
        return response()->json(['logs'=>$bitacora]);
    }
}
