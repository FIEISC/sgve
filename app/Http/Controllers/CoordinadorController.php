<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use sgve\User;

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

	public function datoValidarUsuario(Request $request, $id)
	{
		$activo = $request->input('activo');

		DB::table('users')->where('id', $id)->update(['activo' => $activo]);

		Alert::success('El usuario ha sido activado en el sisyema', 'Usuario activado');

		return redirect()->back();
	}
}
