<?php

namespace App\Http\Controllers\Schedule;

use App\Models\Sirius\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use JWTAuth;
use App\Http\Requests;



class ScheduleController extends Controller
{
    protected static $days=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];

    public function index()
    {
        $schedules = Schedule::all();

        return $schedules;
    }

       public function show($id)
    {
        $schedule = Schedule::findMany($id);

        return $schedule;
    }

    public function now(Request $request)
    {
        /*
         *
         * Query -- Muestra los estudiantes durante la primera hora de clase ---
         *
         *
          select distinct
          e.ID ,e.NOMBRES,e.APELLIDOS, da.NRC,da.ASIGNATURA, da.ID_DOCENTE, da.Miercoles
			,cast(SUBSTRING(dia,1,LOCATE('-',dia)-1) as time ) as Inicio
			,cast(SUBSTRING(dia,7,LOCATE('-',dia)-1) as time ) as Fin
          from datos_academicos as da
          join estudiantes as e on e.id=da.id
          where ID_DOCENTE = 'codigo_profesor'  and
          cast(SUBSTRING(dia,1,LOCATE('-',dia)-1) as time ) between CONCAT(LEFT(curtime(),3),'00:00') and curtime()


        */

        $day=ScheduleController::$days[Carbon::now(-4)->dayOfWeek];
        $hour=Carbon::now(-4)->hour.":".Carbon::now(-4)->minute;

        $schedule=DB::table("datos_academicos as da")
            ->join("estudiantes as e","e.id","=","da.id")
            ->whereRaw("ID_DOCENTE",DB::raw("'".\Auth::user()->getCode()."'" ))
            ->whereRaw(DB::raw("cast(SUBSTRING(".$day.",1,LOCATE('-',".$day.")-1) as time ) between CONCAT(LEFT(curtime(),3),'00:00') and curtime()"))
            ->select('e.ID' ,'e.NOMBRES','e.APELLIDOS','da.NRC','da.ASIGNATURA',DB::raw("cast(SUBSTRING(".$day.",1,LOCATE('-',".$day.")-1) as time ) as Inicio, cast(SUBSTRING(".$day.",7,LOCATE('-',".$day.")-1) as time ) as Fin "))
            ->distinct()->get();

        $data = ["Day"=>$day,"Hour"=>$hour, "Students"=>$schedule];

        return response()
            ->json(compact('data'));

    }
}
