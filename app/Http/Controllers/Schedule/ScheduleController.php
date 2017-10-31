<?php

namespace App\Http\Controllers\Schedule;

use App\Models\Sirius\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

}
