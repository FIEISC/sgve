<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use sgve\User;

use sgve\Ciclo;

use sgve\Viaje;

use Alert;

use DB;

class CoordinadorController extends Controller
{
    function __construct()
    {
    	return $this->middleware(['auth', 'roles:2']);
    }

	public function validarUsuarios()
	{
		/*Pasa todos los usuarios que tienen el activo en 0 y son del mismo plantel*/
		$docentes = User::where('activo', '=', 0)->where('plantel_id', '=', Auth::user()->plantel_id)->get();

		return view('coordinador.validarUsuarios', compact('docentes'));
	}
/*Datos del formulario para activar la cuenta del usuario*/
	public function datoValidarUsuario(Request $request, $id)
	{
		$activo = $request->input('activo');
		DB::table('users')->where('id', $id)->update(['activo' => $activo]);

		Alert::success('El usuario ha sido activado en el sisyema', 'Usuario activado');

		return redirect()->back();
	}

/**/
	public function verViajes()
	{
		$ciclo_actual = Ciclo::where('activo', '=', 1)->first();
		$viajes = Viaje::where('plantel_id', '=', Auth::user()->plantel_id)->where('ciclo_id', '=', $ciclo_actual->id)->where('aceptadoC', '=', 0)->where('aceptadoD', '=', 0)->get();

		return view('coordinador.verViajes', compact('viajes'));
	}

	public function verViajeCoordinador($id)
	{
		$viaje = Viaje::findOrFail($id);
		return view('coordinador.verViajeCoordinador', compact('viaje'));
	}

	public function aceptarViajeCoordinador(Request $request, $id)
	{
		$aceptadoC = $request->input('aceptadoC');
		DB::table('viajes')->where('id', $id)->update(['aceptadoC' => $aceptadoC]);

		Alert::success('Has aceptado el viaje correctamente', 'Viaje aceptado');
		return redirect()->back();

	}

	public function historialViajes()
	{
		$viajes = Viaje::where('activo', '=', 0)->get();

		if (count($viajes) === 0) 
		{
			Alert::info('No hay viajes dados de baja', 'Viajes no encotrados');
			return redirect()->back();
		}

		return view('coordinador.historialViajes', compact('viajes'));
	}

	public function infoViajeHistorial($id)
	{
		$viaje = Viaje::findOrFail($id);
		return view('coordinador.infoViajeHistorial', compact('viaje'));
	}


}
