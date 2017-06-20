<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Viaje;

use sgve\Ciclo;

use Auth;

use Alert;

use DB;

class DirectorController extends Controller
{

	function __construct()
	{
		return $this->middleware(['auth', 'roles:1']);
	}

    public function verViajes()
    {
    	$ciclo_actual = Ciclo::where('activo', '=', 1)->first();
    	$viajes = Viaje::where('plantel_id', '=', Auth::user()->plantel_id)->where('aceptadoC', '=', 1)->where('aceptadoD', '=', 0)->where('ciclo_id', '=', $ciclo_actual->id)->where('activo', '=', 1)->get();

    	return view('director.verViajes', compact('viajes'));
    }

    public function verViaje($id)
    {
    	$viaje = Viaje::findOrFail($id);

    	return view('director.verViaje', compact('viaje'));
    }

    public function aceptarViajeDirector(Request $request, $id)
    {
    	$aceptadoD = $request->input('aceptadoD');
    	DB::table('viajes')->where('id', $id)->update(['aceptadoD' => $aceptadoD]);

    	Alert::success('Has aceptado el viaje', 'Viaje aceptado');
    	return redirect()->back();
    }

    public function historialViajes()
    {
    	$viajes = Viaje::where('plantel_id', '=', Auth::user()->plantel_id)->where('aceptadoD', '=', 1)->where('aceptadoC', '=', 1)->where('activo', '=', 0)->get();

    	return view('director.historialViajesDirector', compact('viajes'));
    }

    public function verViajeHistorialDirector($id)
    {
    	$viaje = Viaje::findOrFail($id);

    	return view('director.verViajeHistorialDirector', compact('viaje'));
    }


}
