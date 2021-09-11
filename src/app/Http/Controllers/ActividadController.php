<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Ealarma;
use App\ActEvento;
use App\AlarmaAct;
use App\BitacoraAlarma;
use App\CabeceraEvento;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad      = new Actividad();
        $ealarma        = new Ealarma();
        $actevento      = new ActEvento();
        $alarmaAct      = new AlarmaAct();
        $bitacoraAlarma = new BitacoraAlarma();

        //PARAMETROS REQUEST
        $namEvent    = $request['namEvent'];
        $dateIni     = $request['dateIni'];
        $dateEnd     = $request['dateEnd'];
        $timeIni     = $request['timeIni'];
        $timeEnd     = $request['timeEnd'];
        $headEvent   = $request['headEvent'];
        $persistent  = $request['persistent'];
        $idUser      = $request['idUser'];
        $sRemember   = $request['sRemember'];
        $sDesc       = $request['sDesc'];
        $sUbication  = $request['sUbication'];
        $sUsersEvent = $request['sUsersEvent'];



        $actividad->nombre = $namEvent;
        $actividad->idUser = $idUser;
        $actividad->save();
        

        $ealarma->idUser      = $idUser;
        $ealarma->idActividad = $actividad->id;
        $ealarma->persistente = intval($persistent);
        $ealarma->save();

        $actevento->idCabEvento   = CabeceraEvento::where('nombre',$headEvent)->get()->first()->id;
        $actevento->idActividad   = $actividad->id;
        $actevento->fechaHoraIE   = $dateIni." ".$timeIni;
        $actevento->fechaHoraFE   = $dateEnd." ".$timeEnd;
        $actevento->participantes = $sUsersEvent;
        $actevento->ubicacion     = $sUbication;
        $actevento->descripcion   = $sDesc;
        $actevento->anticipacion  = $sRemember;
        $actevento->save();

        $alarmaAct->idAlarma         = $ealarma->id;
        $alarmaAct->codResp          = 1;
        $alarmaAct->fechaHoraCierre  = "Sin Finalizar";
        $alarmaAct->idEvento         = $actevento->id;
        $alarmaAct->evidencia        = "";
        $alarmaAct->estado           = "";
        $alarmaAct->comentario       = "";
        $alarmaAct->save();

        $bitacoraAlarma->idEvento     = $actividad->id;
        $bitacoraAlarma->respNomEvent = 1;
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Añadido";
        $bitacoraAlarma->idUser       = $idUser;
        $bitacoraAlarma->save();


        return response()->
        json([
            'nombre'=>$namEvent,
            'idUser'=>$idUser,
            'idActividad'=>$actividad->id,
            'persistente'=>$persistent,
            'idCabEvento'=>$actevento->idCabEvento,
            'fechaHoraIE'=>$dateIni." ".$timeIni,
            'fechaHoraFE'=>$dateEnd." ".$timeEnd,
            'ubicacion'=>$sUbication,
            'participantes'=>$sUsersEvent,
            'descripcion'=>$sDesc,
            'anticipacion'=>$sRemember,
            'idAlarma'=>$ealarma->id,
            'idEvento'=>$actividad->id,
            'codResp'=>$alarmaAct->codResp,
            'fechaHoraCierre'=>$alarmaAct->fechaHoraCierre,
            'respNomEvent'=>$bitacoraAlarma->respNomEvent,
            'fecha'=>$bitacoraAlarma->fecha,
            'hora'=>$bitacoraAlarma->hora,
            'estado'=>$alarmaAct->estado
            ]);
    }
}
