<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Campus;

use sgve\Plantel;

class AlumnoController extends Controller
{
    public function elegirOpciones()
    {
    	return view('alumno.elegirOpciones');
    }

    public function elegirCampusRegistrar()
    {
    	$campus = Campus::all();
    	return view('alumno.elegirCampusRegistrar', compact('campus'));
    }

    public function elegirPlantelRegistrar(Request $request)
    {
    	$campus_id = $request->input('campus_id');
    	$planteles = Plantel::where('campus_id', '=', $campus_id)->get();

    	return view('alumno.registroAlumno', compact('planteles'));
    }

    public function registroAlumno(Request $request)
    {
    	$plantel_id = $request->input('plantel_id');

    	dd($plantel_id);
    }
}
