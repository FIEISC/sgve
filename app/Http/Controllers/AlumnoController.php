<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

//use sgve\Http\Controllers\Controller;

use Validator;

use sgve\Http\Requests\RegistroAlumnoRequest;

use sgve\Campus;

use sgve\Plantel;

use sgve\Carrera;

use sgve\Alumno;

use sgve\Ciclo;

use DB;

use Alert;

class AlumnoController extends Controller
{
    public function elegirOpciones()
    {
    	return view('alumno.elegirOpciones');
    }

    public function elegirCampusRegistrar()
    {
    	$campus = Campus::all();
    	return view('alumno.elegirCampusRegistrar', compact('campus'));
    }

    public function elegirPlantelRegistrar(Request $request)
    {
    	$campus_id = $request->input('campus_id');
    	$planteles = Plantel::where('campus_id', '=', $campus_id)->get();

    	return view('alumno.elegirPlantelRegistrar', compact('planteles'));
    }

    public function registroAlumno(Request $request)
    {
    	$plantel_id = $request->input('plantel_id');
        $plantel = Plantel::findOrFail($plantel_id);
        $carreras = Carrera::where('plantel_id', '=', $plantel->id)->get();
        $ciclo = Ciclo::where('activo', '=', 1)->first();

    	return view('alumno.registroAlumno', compact('plantel', 'carreras', 'ciclo'));
    }

    public function datosRegistroAlumno(Request $request)
    {

       /* $this->validate($request, [
            'nom_alumno' => 'required',
            'no_cuenta' => 'required',
            'nom_padre' => 'required',
            'tel_padre' => 'required',
            'no_imss' => 'required',
            'plantel_id' => 'required',
            'carrera_id' => 'required',
            ]);
*/
        /*    Validator::make($request->all(), [
                
                'nom_alumno' => 'required',
                'no_cuenta' => 'required',
                'nom_padre' => 'required',
                'tel_padre' => 'required',
                'no_imss' => 'required',
                'plantel_id' => 'required',
                'carrera_id' => 'required',
                ]);*/


                if ($request->input('carrera_id') === null) 
                {
                    Alert::warning('Elegir Carrera');
                    return redirect()->back();
                }

/*
        if ($request->input('aceptado') == 0) 
        {
            Alert::warning('Para registrarse se tienen que aceptar el reglamento', 'Registro fallido');
            return redirect()->back();
        }

        else
        {*/
        DB::table('alumnos')->insert([
            'nom_alumno' => $request->input('nom_alumno'),
            'no_cuenta' => $request->input('no_cuenta'),
            'nom_padre' => $request->input('nom_padre'),
            'tel_padre' => $request->input('tel_padre'),
            'no_imss' => $request->input('no_imss'),
            'plantel_id' => $request->input('plantel_id'),
            'carrera_id' => $request->input('carrera_id'),
            'semestre' => $request->input('semestre'),
            'aceptado' => $request->input('aceptado')
            ]);
            
            Alert::success('Has sido registrado en el sistema', 'Registro exitoso');
            return redirect()->route('elegirCampusRegistrar');
    }


/*    public function datoAceptadoRegistroAlumno(Request $request)
    {
        dd($request->all());
    }*/
}
