<?php

namespace App\Http\Controllers\Cursante;

use App\Models\Sirius\Cursante;
use Illuminate\Http\Request;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class CursanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursantes = Cursante::all();

        return $cursantes;
    }
    public function show($id)
    {

        $cursante = Cursante::findMany($id);

        return $cursante;
    }

    public function findQuery(){
        /**
         ------- EXTREME LOW QUERY in MySql -------
         *

        SELECT DISTINCT
        datos_academicos.NRC AS id,
        datos_academicos.ASIGNATURA,
        datos_academicos.ID_DOCENTE,
        datos_academicos.NOMBRES_DOCENTE,
        datos_academicos.APELLIDOS_DOCENTE,
        estudiantes.ID,
        estudiantes.NOMBRES AS NOMBRE_ESTUDIANTE,
        estudiantes.APELLIDOS AS APELLIDOS_ESTUDIANTE,
        estudiantes.PROGRAMA AS PROGRAMA
        FROM
        estudiantes
        JOIN datos_academicos ON datos_academicos.ID = estudiantes.ID
         *
         *
         * Query Optimo desde cliente pero no desde aquí, también lento desde la wiev "cursantes" --- raro.
         * Tocó hacer la tabla "Cursantes" sujeta a un script de actualización.
         *
         */

        $students=DB::table("estudiantes")
            ->join("datos_academicos","datos_academicos.ID","=","estudiantes.ID")
            ->select('datos_academicos.NRC AS id' ,'datos_academicos.ASIGNATURA','datos_academicos.ID_DOCENTE','datos_academicos.NOMBRES_DOCENTE','datos_academicos.APELLIDOS_DOCENTE','estudiantes.ID as CODIGO','estudiantes.NOMBRES AS NOMBRE_ESTUDIANTE','estudiantes.APELLIDOS AS APELLIDOS_ESTUDIANTE','estudiantes.PROGRAMA')
            ->distinct()->get();

        return response()
            ->json(compact('students'));


    }

}
