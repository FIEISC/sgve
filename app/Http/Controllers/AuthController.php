<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Campus;

use sgve\Plantel;

use sgve\User;

use Alert;

use Auth;

class AuthController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth', ['only' => ['home', 'salir']]);
    }

/*Redirecciona al modulo para elegir un campus*/
    public function elegirCampus()
    {
    	$campus = Campus::all();

        if (count($campus) === 0) 
        {
             Alert::info('Registrar al menos un campus', 'Campus no encontrados');
             return redirect()->back();
        }

    	return view('auth.elegirCampus', compact('campus'));
    }

/*Redirecciona al modulo para elegir un plantel mandandole el id del campus elegido y asi mostrar 
todos los planteles que pertenecen al campus elegido*/
    public function datoCampus(Request $request)
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

        return view('auth.elegirPlantel', compact('planteles'));
    }

/*Redirecciona al modulo de registro pasandole el id del plantel elegido previamente y asi registrar al usuario en el plantel elegido*/
    public function datoPlantel(Request $request)
    {
        $plantel_id = $request->input('plantel_id');

        if ($plantel_id === null) 
        {
            Alert::info('Elige un plantel', 'Elegir plantel');

            return redirect()->back();
        }

        $plantel = Plantel::findOrFail($plantel_id);

        return view('auth.registro', compact('plantel'));
    }

    public function datosRegistro(Request $request)
    {
       // User::create($request->all());

        User::create([
            
            'nom_docente' => $request->input('nom_docente'),
            'no_cuenta' => $request->input('no_cuenta'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rol' => $request->input('rol'),
            'plantel_id' => $request->input('plantel_id')
            ]);

        Alert::success('En espera de ser activo por el coordinador de área', 'Registro exitoso');

        return redirect()->route('login');
    }

    /*Redirecciona al login principal*/
    public function login()
    {
        return view('auth.login');
    }

    /*Recibe los datos del formulario del login */

    public function datosLogin(Request $request)
    {
        $no_cuenta = $request->input('no_cuenta');
        $password = $request->input('password');

        if (!Auth::attempt(['no_cuenta' => $no_cuenta, 'password' => $password, 'activo' => 1])) 
        {
            Alert::warning('Datos incorrectos o cuenta no activa en ese caso ponerse en contacto con el coordinador de área', 'Entrada rechazada');
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function home()
    {
        return view('home');
    }

    public function salir()
    {
        Auth::logout();

        return redirect()->route('login');
    }


}
