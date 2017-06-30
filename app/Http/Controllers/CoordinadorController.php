<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Notifications\MensajeEnviado;

use Auth;

use sgve\User;

use sgve\Ciclo;

use sgve\Viaje;

use sgve\Mensaje;

use Alert;

use DB;

use PDF;

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

	public function darBajaViajes()
	{
		$ciclo_actual = Ciclo::where('activo', '=', 1)->first();
		$viajes = Viaje::where('plantel_id', '=', Auth::user()->plantel_id)->where('ciclo_id', '=', $ciclo_actual->id)->where('aceptadoC', '=', 1)->where('aceptadoD', '=', 1)->where('reporte', '!=', null)->where('activo', '=', 1)->get();

		return view('coordinador.darBajaViajes', compact('viajes'));
	}

	public function verViajeCompleto($id)
	{
		$viaje = Viaje::findOrFail($id);
		return view('coordinador.verViajeCompleto', compact('viaje'));
	}

	public function viajePDF($id)
	{
		$viaje = Viaje::findOrFail($id);
		$pdf = PDF::loadView('coordinador.viajePDF', ['viaje' => $viaje]);
		return $pdf->download('viaje.pdf');
	}

	public function darBajaViaje(Request $request, $id)
	{
		$activo = $request->input('activo');
		DB::table('viajes')->where('id', $id)->update(['activo' => $activo]);

		Alert::success('El viaje fué dado de baja exitosamente', 'Viaje dado de baja');
		return redirect()->back();
	}

	public function crearMensaje()
	{
		$docentes = User::where('plantel_id', '=', Auth::user()->plantel_id)->where('rol', '!=', 0)->where('rol', '!=', 1)->where('rol', '!=', Auth::user()->rol)->where('activo', '=', 1)->get();

		return view('coordinador.crearMensaje', compact('docentes'));
	}

	public function datosMensaje(Request $request)
	{
		/*dd($request->all());*/

		$this->validate($request, [
			'rx_user' => 'required|exists:users,id',
			'mensaje' => 'required'
			]);

		$mensaje = Mensaje::create([
			'tx_user' => Auth::user()->id,
			'rx_user' => $request->input('rx_user'),
			'mensaje' => $request->input('mensaje')
			]);
       
       //Para encontrar el usuario al que se envia el mensaje

    	$rx_user = User::find($request->input('rx_user'));

    	$rx_user->notify(new MensajeEnviado($mensaje));

		Alert::success('El mensaje fué enviado exitosamente', 'Mensaje enviado');

		return redirect()->route('crearMensaje');
	}

}
