<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Alert;

use sgve\User;

use sgve\Campus;

use sgve\Plantel;

use sgve\Carrera;

use sgve\Ciclo;

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

    /*Crear ciclos escolares*/

    public function crearCiclos()
    {
        return view('admin.paginas.crearCiclos');
    }

    public function datosCrearCiclo(Request $request)
    {
        $nom_ciclo = strtoupper($request->input('nom_ciclo'));
        $ciclo = $request->input('ciclo');
        $fec_ini = $request->input('fec_ini');
        $fec_fin = $request->input('fec_fin');
        $activo = $request->input('activo');

        DB::table('ciclos')->insert([
            'nom_ciclo' => $nom_ciclo,
            'ciclo' => $ciclo,
            'fec_ini' => $fec_ini,
            'fec_fin' => $fec_fin,
            'activo' => $activo,]);

        Alert::success('Ciclo registrado en la bd', 'Ciclo creado exitosamente');
        return redirect()->back();
    }


    /*Crear Carreras*/

    public function elegirCampusAdmin()
    {
        $campus = Campus::all();
        return view('admin.paginas.elegirCampus', compact('campus'));
    }

    public function datoCampusAdmin(Request $request)
    {
        $campus_id = $request->input('campus_id');

        if ($campus_id === null) 
        {
            Alert::info('Elige un campus', 'Elegir Campus');

            return redirect()->back();
        }
    
        $planteles = Plantel::where('campus_id', '=', $campus_id)->get();

        if (count($planteles) === 0) 
        {
            Alert::info('Registrar al menos un plantel para el campus elegido', 'Planteles no encontrados');
            return redirect()->back();
        }

        return view('admin.paginas.elegirPlantel', compact('planteles'));
    }

    public function crearCarreras(Request $request)
    {
       $plantel_id = $request->input('plantel_id');

       $plantel = Plantel::findOrFail($plantel_id);

       return view('admin.paginas.crearCarreras', compact('plantel'));
    }

    public function datosCrearCarreras(Request $request)
    {
        $this->validate($request, [
                 'nom_carrera' => 'required',
                 'siglas' => 'required',
                 'grupo' => 'required',
                 'plantel_id' => 'required'
                ]);
            
            $nom_carrera = strtoupper($request->input('nom_carrera'));
            $siglas = strtoupper($request->input('siglas'));
            $grupo = strtoupper($request->input('grupo'));
            $plantel_id = $request->input('plantel_id');

            Carrera::create(['nom_carrera' => $nom_carrera, 'siglas' => $siglas, 'grupo' => $grupo, 'plantel_id' => $plantel_id]);
            
            Alert::success('Carrera creada para el plantel', 'Carrera creada!');
            return redirect()->route('elegirCampusAdmin');
    }

}
