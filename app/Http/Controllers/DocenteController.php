<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Http\Requests\ViajeRequest;

use sgve\Ciclo;

use sgve\Plantel;

use sgve\Carrera;

use sgve\User;

use sgve\Viaje;

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

    public function datosCrearViaje(ViajeRequest $request)
    {
    	/*dd($request->all());*/

    	$nom_viaje = $request->input('nom_viaje');
    	$motivos = $request->input('motivos');
    	$impacto = $request->input('impacto');
    	$fec_ini = $request->input('fec_ini');
    	$fec_fin = $request->input('fec_fin');
    	$compa = $request->input('compa');
    	$user_id = $request->input('user_id');
    	$carrera_id = $request->input('carrera_id');
    	$ciclo_id = $request->input('ciclo_id');
    	$plantel_id = $request->input('plantel_id');

    	Viaje::create([
            'nom_viaje' => $nom_viaje,
            'motivos' => $motivos,
            'impacto' => $impacto,
            'fec_ini' => $fec_ini,
            'fec_fin' => $fec_fin,
            'compa' => $compa,
            'user_id' => $user_id,
            'carrera_id' => $carrera_id,
            'ciclo_id' => $ciclo_id,
            'plantel_id' => $plantel_id,
    		]);

    	Alert::success('Viaje creado exitosamente', 'Viaje creado');

    	return redirect()->route('elegirCiclo');
    }
}
