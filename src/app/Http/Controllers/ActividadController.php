<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Ealarma;
use App\ActEvento;
use App\AlarmaAct;
use App\BitacoraAlarma;
use App\CabeceraEvento;
use Illuminate\Http\Request;
use DB;

class ActividadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conditional = $request['condicional'];
        $user      = $request['user'];
        $result      = DB::select("SELECT actEvent.id,actEvent.idCabEvento,actEvent.idActividad,actEvent.fechaHoraIE,actEvent.fechaHoraFE,activit.nombre, alarmacts.codResp FROM act_eventos as actEvent,actividades as activit, alarma_acts as alarmacts WHERE idActividad in (SELECT id FROM actividades ".$conditional." or participantes like '%".$user."%') and actEvent.idActividad = activit.id and alarmacts.idEvento = actEvent.id");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexForAproveEvent(Request $request)
    {
        $idEvent = $request['idEvent'];
        $result      = DB::select("SELECT act.nombre as actividades_nombre,resp.nombre as resp_alarmas_codResp,ealarm.id as e_alarmas_id ,acteven.fechaHoraIE as act_eventos_fechaHoraIE ,acteven.fechaHoraFE as act_eventos_fechaHoraFE , acteven.participantes as act_eventos_participantes, acteven.ubicacion as act_eventos_ubicacion, acteven.descripcion as act_eventos_descripcion , cabevent.nombre as cabecera_eventos_nombre, ealarm.persistente as persistente FROM alarma_acts as alact, actividades as act , e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where idEvento =".$idEvent." and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp AND alact.id =act.id AND ealarm.idActividad = acteven.idActividad");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexListActivities(Request $request)
    {
        $conditional = $request['condicional'];
        $result      = DB::select("SELECT alact.id, act.nombre as nombreReunion,cabevent.nombre as tipoEvent,acteven.fechaHoraIE,acteven.fechaHoraFE ,ealarm.persistente,resp.nombre as glosaCierre, act.id as idActividad,alact.estado as estado,alact.comentario as comment FROM alarma_acts as alact,actividades as act ,e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where idEvento in (SELECT id FROM actividades ".$conditional." ) and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp and alact.id =act.id and ealarm.idActividad = acteven.idActividad ");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexListActivitiesByDate(Request $request)
    {
        $conditional = $request['condicional'];
        $sdate = $request['sdate'];
        $result      = DB::select("SELECT alact.id, act.nombre as nombreReunion,cabevent.nombre as tipoEvent,acteven.fechaHoraIE,acteven.fechaHoraFE ,ealarm.persistente,resp.nombre as glosaCierre, act.id as idActividad,alact.estado as estado,alact.comentario as comment FROM alarma_acts as alact,actividades as act ,e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where idEvento in (SELECT id FROM actividades ".$conditional." ) and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp and alact.id =act.id and ealarm.idActividad = acteven.idActividad and acteven.fechaHoraIE LIKE  '".$sdate."%'");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexListActivitiesByFilter(Request $request)
    {
        $conditional = $request['condicional'];
        $sdate = $request['sdate'];
        $status = $request['status'];
        $result      = DB::select("SELECT alact.id, act.nombre as nombreReunion,cabevent.nombre as tipoEvent,acteven.fechaHoraIE,acteven.fechaHoraFE ,ealarm.persistente,resp.nombre as glosaCierre, act.id as idActividad,alact.estado as estado,alact.comentario as comment FROM alarma_acts as alact,actividades as act ,e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where idEvento in (SELECT id FROM actividades ".$conditional." ) and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp and alact.id =act.id and ealarm.idActividad = acteven.idActividad and acteven.fechaHoraIE LIKE  '".$sdate."%' and resp.nombre LIKE  '".$status."%'");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexApprove(Request $request)
    {
        $result      = DB::select("SELECT alact.id as alactId,act.nombre as actNombre, alact.estado as alactEstado,resp.codResp as respCodResp,alact.fechaHoraCierre as  alactFechaHoraCierre, alact.evidencia as  alactEvidencia, alact.comentario as  alactComentario,acteven.participantes as actevenparticipantes, acteven.ubicacion as actevenubicacion, acteven.anticipacion as actevenanticipacion, acteven.descripcion as actevendescripcion,cabevent.nombre as  cabeventid FROM alarma_acts as alact, actividades as act , e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where alact.codResp = 2 and alact.estado = 'Pendiente' and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp AND alact.id =act.id AND ealarm.idActividad = acteven.idActividad");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    public function indexAllApprove(Request $request)
    {
        $result      = DB::select("SELECT alact.id as alactId,act.nombre as actNombre, alact.estado as alactEstado,resp.codResp as respCodResp,alact.fechaHoraCierre as  alactFechaHoraCierre, alact.evidencia as  alactEvidencia, alact.comentario as  alactComentario,acteven.participantes as actevenparticipantes, acteven.ubicacion as actevenubicacion, acteven.anticipacion as actevenanticipacion, acteven.descripcion as actevendescripcion,cabevent.nombre as  cabeventid FROM alarma_acts as alact, actividades as act , e_alarmas as ealarm, resp_alarmas as resp, act_eventos as acteven, cabecera_eventos as cabevent where alact.codResp = 2 and alact.estado != 'Pendiente' and ealarm.idActividad = act.id and cabevent.id = acteven.idCabEvento and alact.codResp = resp.codResp AND alact.id =act.id AND ealarm.idActividad = acteven.idActividad");
        return response()->json(['activities'=>$result]);
        //DB::select('select * from users where active = ?', [1])
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detailByDate(Request $request)
    {
        $user                 = $request['user'];
        $date                 = $request['date'];
        $listActivities       = array();
        $listActivitiesHeader = array();
        $listEventHeader      = array();
        $listEAlarms          = array();
        $listResponseObjects  = array();


        $actividades  = DB::select("SELECT * FROM actividades, act_eventos where actividades.id = act_eventos.idActividad and (act_eventos.participantes like '%".$user."%' or actividades.idUser = ".$user.") ");
        $cabecera_eventos  = DB::select("SELECT * FROM cabecera_eventos");
        $e_alarmas         = DB::select("SELECT * FROM e_alarmas, act_eventos where e_alarmas.idActividad = act_eventos.idActividad and (act_eventos.participantes like '%".$user."%' or e_alarmas.idUser = ".$user.") ");

        for ($i=0; $i <count($actividades) ; $i++) { 
            array_push($listActivitiesHeader,$actividades[$i]->id."___".$actividades[$i]->nombre);
            array_push($listActivities,$actividades[$i]->id);
        }

        for ($i=0; $i <count($cabecera_eventos) ; $i++) { 
            array_push($listEventHeader,$cabecera_eventos[$i]->id."___".$cabecera_eventos[$i]->nombre);
        }

        for ($i=0; $i <count($e_alarmas) ; $i++) { 
            array_push($listEAlarms,$e_alarmas[$i]->id."___".$e_alarmas[$i]->persistente);
        }

        $StListAct =implode(',',$listActivities);

        

        if(count($listActivities)>0){
            $act_eventos       = DB::select("SELECT *  FROM act_eventos actevent,alarma_acts as alarmacts WHERE idActividad in (".$StListAct.") and fechaHoraIE like '".$date."%' and alarmacts.idEvento = actevent.id");
            for ($i=0; $i <count($act_eventos) ; $i++) { 
                $idCabEvent = $act_eventos[$i]->idCabEvento;
                $idActividad = $act_eventos[$i]->idActividad;
                $arrayListHeadActivity  = array();
                $arrayListEvent         = array();
                $arrayDateIni           = explode(" ",$act_eventos[$i]->fechaHoraIE);
                $arrayDateEnd           = explode(" ",$act_eventos[$i]->fechaHoraFE);
                $EAlarms = "";
    
                for ($j=0; $j < count($listEventHeader); $j++) { 
                    if(explode("___",$listEventHeader[$j])[0] == $idCabEvent){
                        $arrayListEvent = explode("___",$listEventHeader[$j]);
                    }
                }
    
                for ($j=0; $j < count($listActivitiesHeader); $j++) { 
                    if(explode("___",$listActivitiesHeader[$j])[0] == $idActividad){
                        $arrayListHeadActivity = explode("___",$listActivitiesHeader[$j]);
                    }
                }
    
                for ($j=0; $j < count($listEAlarms); $j++) { 
                    if(explode("___",$listEAlarms[$j])[0] == $idActividad){
                        $EAlarms = $listEAlarms[$j];
                    }
                }
    
                $tempObj = new \stdClass();
                $tempObj->id            = $act_eventos[$i]->id;
                $tempObj->nameEvent     = $arrayListHeadActivity[1];
                $tempObj->dateIni       = $arrayDateIni[0];
                $tempObj->timeIni       = $arrayDateIni[1];
                $tempObj->dateEnd       = $arrayDateEnd[0];
                $tempObj->timeEnd       = $arrayDateEnd[1];
                $tempObj->idTypeEvent   = $arrayListEvent[0];
                $tempObj->typeEvent     = $arrayListEvent[1];
                $tempObj->idEAlarms     = $EAlarms;
                $tempObj->idHeadEvent   = $arrayListHeadActivity[0];
                $tempObj->participantes = $act_eventos[$i]->participantes;
                $tempObj->ubicacion     = $act_eventos[$i]->ubicacion;
                $tempObj->descripcion   = $act_eventos[$i]->descripcion;
                $tempObj->anticipacion  = $act_eventos[$i]->anticipacion;
                
                array_push($listResponseObjects,$tempObj);
            }
        }
        

        return response()->json(['act_eventos'=>$listResponseObjects]);
        //return response()->json(['listActivitiesHeader'=>$listActivitiesHeader,'listActivities'=>$listActivities,'listEventHeader'=>$listEventHeader,'listEAlarms'=>$listEAlarms,'actividades'=>$actividades,'cabecera_eventos'=>$cabecera_eventos,'e_alarmas'=>$e_alarmas,'StListAct'=>$StListAct,'act_eventos'=>$act_eventos,'act_eventos_response'=>$listResponseObjects]);
    }

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
        if(!strcmp($persistent,"true")){
            $ealarma->persistente = 1;
        }
        else{
            $ealarma->persistente = 0;
        }
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
        $bitacoraAlarma->respNomEvent = $actividad->nombre;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $bitacoraAlarma = new BitacoraAlarma();
        
        $idHeadEvent = $request['idHeadEvent'];
        $idUser      = $request['idUser'];

        $actividad = Actividad::find($idHeadEvent);

        $bitacoraAlarma->idEvento     = $actividad->id;
        $bitacoraAlarma->respNomEvent = $actividad->nombre;
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Eliminado";
        $bitacoraAlarma->idUser       = $idUser;
        $bitacoraAlarma->save();

        $actividad->delete();



        return $bitacoraAlarma;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $bitacoraAlarma = new BitacoraAlarma();
        
        $nombre        = $request['nombre'];
        $idUser        = $request['idUser'];
        $sidHeadEvent  = $request['sidHeadEvent'];
        if(!strcmp($request['persistente'],"true")){
            $persistente   = 1;
        }
        else{
            $persistente   = 0;
        }
        
        $sidEalarm     = $request['sidEalarm'];
        $idActividad   = $request['idActividad'];
        $fechaHoraIE   = $request['fechaHoraIE'];
        $fechaHoraFE   = $request['fechaHoraFE'];
        $ubicacion     = $request['ubicacion'];
        $participantes = $request['participantes'];
        $descripcion   = $request['descripcion'];
        $anticipacion  = $request['anticipacion'];
        $idEvent       = $request['idEvent'];
        $headEvent     = $request['headEvent'];
        $idheadEvent     = DB::select("SELECT id FROM cabecera_eventos where nombre = '".$headEvent."'")[0]->id;

        $actividad = Actividad::where('id',$sidHeadEvent)->update([
            'nombre'=>$nombre,
            'idUser'=>$idUser
            ]);

        $ealarma   = Ealarma::where('id',$sidEalarm)->update([
            'idActividad'=>$idActividad,
            'idUser'=>$idUser,
            'persistente'=>$persistente]);

        $actevento = ActEvento::where('id',$idEvent)->update([
            'idCabEvento'=>$idheadEvent,
            'idActividad'=>$sidHeadEvent,
            'fechaHoraIE'=>$fechaHoraIE,
            'fechaHoraFE'=>$fechaHoraFE,
            'ubicacion'=>$ubicacion,
            'participantes'=>$participantes,
            'descripcion'=>$descripcion,
            'anticipacion'=>$anticipacion,
            ]);
            
        $bitacoraAlarma->idEvento     = $idEvent;
        $bitacoraAlarma->respNomEvent = $nombre;
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Modificado";
        $bitacoraAlarma->idUser       = $idUser;
        $bitacoraAlarma->save();



        return $bitacoraAlarma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateByNotification(Request $request)
    {

        $bitacoraAlarma = new BitacoraAlarma();
        $nombre        = $request['nombre'];
        $idUser        = $request['idUser'];
        if(!strcmp($request['persistente'],"true")){
            $persistente   = 1;
        }
        else{
            $persistente   = 0;
        }
        
        $sidEalarm     = $request['idEalarm'];
        $idActividad   = $request['idActividad'];
        $fechaHoraIE   = $request['fechaHoraIE'];
        $fechaHoraFE   = $request['fechaHoraFE'];

        $idEvent       = $request['idEvent'];
        $headEvent     = $request['headEvent'];

        $codResp        = $request['codResp'];
        $evidencia      = $request['evidencia'];
        $comentario     = $request['comentario'];
        $fechaHoraCierre= $request['fechaHoraCierre'];
        $estado         = $request['HeadResp'];

        $idheadEvent     = DB::select("SELECT id FROM cabecera_eventos where nombre = '".$headEvent."'")[0]->id;

        $actividad = Actividad::where('id',$idActividad)->update([
            'nombre'=>$nombre,
            'idUser'=>$idUser
            ]);

        $ealarma   = Ealarma::where('id',$sidEalarm)->update([
            'idActividad'=>$idActividad,
            'idUser'=>$idUser,
            'persistente'=>$persistente]);

        $actevento = ActEvento::where('id',$idEvent)->update([
            'idCabEvento'=>$idheadEvent,
            'idActividad'=>$idActividad,
            'fechaHoraIE'=>$fechaHoraIE,
            'fechaHoraFE'=>$fechaHoraFE,
            ]);

        $alarmact = AlarmaAct::where('id',$idEvent)->update([
            'codResp'=>$codResp,
            'evidencia'=>$evidencia,
            'estado'=>$estado,
            'comentario'=>$comentario,
            'fechaHoraCierre'=>$fechaHoraCierre,
            ]);

            
            
        $bitacoraAlarma->idEvento     = $idEvent;
        $bitacoraAlarma->respNomEvent = $nombre;
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = $estado;
        $bitacoraAlarma->idUser       = $idUser;
        $bitacoraAlarma->save();



        return $bitacoraAlarma;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateFinishEvent(Request $request)
    {

        $bitacoraAlarma = new BitacoraAlarma();
        $nombre        = $request['nombre'];
        $idUser        = $request['idUser'];

        $idEvent       = $request['idEvent'];

        $codResp        = $request['codResp'];
        $evidencia      = $request['evidencia'];
        $comentario     = $request['comentario'];
        $fechaHoraCierre= $request['fechaHoraCierre'];
        $estado         = $request['HeadResp'];


        $alarmact = AlarmaAct::where('id',$idEvent)->update([
            'codResp'=>2,
            'evidencia'=>$evidencia,
            'estado'=>"Pendiente",
            'comentario'=>$comentario,
            'fechaHoraCierre'=>$fechaHoraCierre,
            ]);

            
            
        $bitacoraAlarma->idEvento     = $idEvent;
        $bitacoraAlarma->respNomEvent = $nombre;
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Finalizado";
        $bitacoraAlarma->idUser       = $idUser;
        $bitacoraAlarma->save();



        return $bitacoraAlarma;
    }

    public function approve(Request $request)
    {
        $bitacoraAlarma = new BitacoraAlarma();
        $idEvent      = $request['idEvent'];
        $status       = $request['status'];
        $comentario   = $request['comentario'];

        if(!strcmp($request['status'],"Rechazado")){
            $alarmact = AlarmaAct::where('id',$idEvent)->update([
                'estado'=>$status,
                'comentario'=>$comentario,
                ]);
        }
        else{
            $alarmact = AlarmaAct::where('id',$idEvent)->update([
                'estado'=>$status,
                ]);
        }
        $bitacoraAlarma->id           = 111;
        $bitacoraAlarma->idEvento     = 111;
        $bitacoraAlarma->respNomEvent = "SAMPLE";
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Finalizado";
        $bitacoraAlarma->idUser       = "0000";
        return $bitacoraAlarma;
    }

    public function updateForapprove(Request $request)
    {
        $bitacoraAlarma = new BitacoraAlarma();
        $idEvent      = $request['idEvent'];
        $evidencia       = $request['evidencia'];


        $alarmact = AlarmaAct::where('id',$idEvent)->update([
            'estado'=>"Pendiente",
            'evidencia'=>$evidencia,
            'comentario'=>"",
            ]);


        $bitacoraAlarma->id           = 111;
        $bitacoraAlarma->idEvento     = 111;
        $bitacoraAlarma->respNomEvent = "SAMPLE";
        $bitacoraAlarma->fecha        = date('d-m-Y');
        $bitacoraAlarma->hora         = date('H:i:s');
        $bitacoraAlarma->estado       = "Finalizado";
        $bitacoraAlarma->idUser       = "0000";
        return $bitacoraAlarma;
    }
}
