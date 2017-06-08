<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Ciclo;

use Alert;

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
    	
    	return view('docente.crearViaje', compact('ciclo'));
    }
}
