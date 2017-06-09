<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Ciclo;

use sgve\Plantel;

use sgve\Carrera;

use sgve\User;

use Alert;

use Auth;

class DocenteController extends Controller
{

	function __construct()
	{
		return $this->middleware(['auth', 'roles:3']);
	}

	public function elegirCiclo()
	{
		$ciclo = Ciclo::where('activo', '=', 1)->first();

		if ($ciclo === null) 
		{
			Alert::warning('Crear un ciclo escolar', 'Ciclo no encontrado');

			return redirect()->back();
		}

		return view('docente.elegirCiclo', compact('ciclo'));
	}
    
    public function crearViaje($id)
    {
    	$ciclo = Ciclo::findOrFail($id);
    	$plantel = Plantel::where('id', '=', Auth::user()->plantel_id)->first();
    	$carreras = Carrera::where('plantel_id', '=', Auth::user()->plantel_id)->get();
    	$docentes = User::where('id', '!=', Auth::user()->id)->where('rol', '!=', 0)->where('plantel_id', '=', Auth::user()->plantel_id)->get();
    	
    	return view('docente.crearViaje', compact('ciclo', 'plantel', 'carreras', 'docentes'));
    }

    public function datosCrearViaje(Request $request)
    {
    	dd($request->all());
    }
}
