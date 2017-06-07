<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Campus;

use sgve\Plantel;

use sgve\User;

use Alert;

class AuthController extends Controller
{
    /*Redirecciona al login principal*/
    public function login()
    {
    	return view('auth.login');
    }

/*Redirecciona al modulo para elegir un campus*/
    public function elegirCampus()
    {
    	$campus = Campus::all();

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
        User::create($request->all());

        Alert::success('En espera de ser activo por el coordinador de área', 'Registro exitoso');

        return redirect()->route('login');
    }

  /*  public function registro()
    {
    	return view('auth.registro');
    }*/
}
