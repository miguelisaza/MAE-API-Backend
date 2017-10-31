<?php

namespace App\Http\Controllers\Cursante;

use App\Models\Sirius\Cursante;
use Illuminate\Http\Request;
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

}
