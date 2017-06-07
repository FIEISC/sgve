<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Alert;

use sgve\User;

use DB;

class AdminController extends Controller
{

	function __construct()
	{
		return $this->middleware('auth', ['except' => ['loginAdmin', 'datosLoginAdmin']]);
	}

/*Redirecciona al home del administrador*/
	public function homeAdmin()
	{
		return view('admin.home');
	}
/*Redirecciona al login del administrador*/
    public function loginAdmin()
    {
    	return view('admin.login');
    }
/*Datos para validar el login del admistrador*/
    public function datosLoginAdmin(Request $request)
    {
    	$no_cuenta = $request->input('no_cuenta');
    	$password = $request->input('password');

    	if (!Auth::attempt(['no_cuenta' => $no_cuenta, 'password' => $password, 'rol' => 0, 'activo' => 1])) 
    	{
    		Alert::warning('Verifica tus datos', 'Datos incorrectos');
    		return redirect()->back();
    	}

    	return redirect()->route('homeAdmin');
    }

/*Redirecciona al login del admistrador cuando hace logout*/
    public function salirAdmin()
    {
    	Auth::logout();

    	return redirect()->route('loginAdmin');
    }

    /*Validar usuarios*/

    public function  validarUsuarios()
    {
    	$docentes = User::where('activo', '=', 0)->where('rol', '!=', 0)->get();

    	return view('admin.paginas.validarUsuarios', compact('docentes'));
    }

    public function datoActivarUsuario(Request $request, $id)
    {   
        $activo = $request->input('activo');

        DB::table('users')->where('id', $id)->update(['activo' => $activo]);

        Alert::success('Usuario activado en el sistema', 'Usuario activado');

        return redirect()->back();
    }

}
