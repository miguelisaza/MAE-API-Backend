<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use Illuminate\Http\Request;
use DB;

class MissingController extends Controller
{

    public function index()
    {
        $misslog = Missing::all();

        return $misslog;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /*
         *
         * Almacena en la tabla Missing las personas que han faltado a clase
         * TODO: Recibe cualquier ID y NRC, Realizar validaciones en la DB para dejar ingresar solo las de el curso correspondiente
         *
         */


        $rules = [
            'idEstudiante' => 'required',
            'nrc' => 'required'
        ];

        $this->validate($request, $rules);

        $campos = $request->all();

        $missing = Missing::create($campos);

        return response()->json(['data' => $missing], 201);
    }


    public function show($nrc)
    {
        /**
         * @param nrc
         * Muestra todas las personas que faltaron en el curso $nrc
         *
         */

        $course = DB::table("missing as m")
            ->join('estudiantes as e','e.id','=','m.idEstudiante')
            ->whereRaw('nrc', "'".$nrc."'")
            ->select('m.idEstudiante as CODIGO', 'e.NOMBRES','e.APELLIDOS','e.PROGRAMA', 'm.created_at as FECHA_FALTA')
            ->distinct()

            ->get();

        return response()->json($course, 200);

    }

    public function update(Request $request, Missing $assistants)
    {
        /**
         *
         TODO: Hacer el update
         */
    }

}