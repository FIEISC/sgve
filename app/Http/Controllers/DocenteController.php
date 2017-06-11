<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Http\Requests\ViajeRequest;

use sgve\Http\Requests\EmpresaRequest;

use sgve\Ciclo;

use sgve\Plantel;

use sgve\Carrera;

use sgve\User;

use sgve\Viaje;

use sgve\Empresa;

use Alert;

use Auth;

use DB;

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

/*Muestra la lista de viajes que creo el usuario actualmente autentificado en el sistema, se pasa el id del ciclo que esta actualmente activo y tiene el id en el viaje*/

    public function listaViajes()
    { 
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();
        $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo_actual->id)->get();

        return view('docente.listaViajes', compact('viajes'));
    }

/*Pasa el id del viaje elegido para ver*/
    public function verViaje($id)
    {
        $viaje = Viaje::findOrFail($id);
        return view('docente.verViaje', compact('viaje'));
    }

/*Pasa el id del viaje elegido para editarlo*/
    public function editarViaje($id)
    {
        $viaje = Viaje::findOrFail($id);
        $docentes = User::where('id', '!=', Auth::user()->id)->where('rol', '!=', 0)->where('plantel_id', '=', Auth::user()->plantel_id)->get();
        
        return view('docente.editarViaje', compact('viaje', 'docentes'));
    }

    public function datosEditarViaje(Request $request, $id)
    {

        $nom_viaje = $request->input('nom_viaje');
        $motivos = $request->input('motivos');
        $impacto = $request->input('impacto');
        $fec_ini = $request->input('fec_ini');
        $fec_fin = $request->input('fec_fin');
        $compa = $request->input('compa');

        if ($compa === null) 
        {
            Alert::warning('Eligue una opción de la lista', 'Elegir opción');
            return redirect()->back();
        }

        DB::table('viajes')->where('id', $id)->update([
            
            'nom_viaje' => $nom_viaje,
            'motivos' => $motivos,
            'impacto' => $impacto,
            'fec_ini' => $fec_ini,
            'fec_fin' => $fec_fin,
            'compa' => $compa,
            ]);

        Alert::success('Viaje modificado en la base de datos', 'Viaje modificado');

        return redirect()->route('listaViajes');
    }

    public function viajesAsignados()
    {
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();
        $viajes = Viaje::where('compa', '=', Auth::user()->nom_docente)->where('ciclo_id', '=', $ciclo_actual->id)->get();

        return view('docente.viajesAsignados', compact('viajes'));
    }

    public function verViajeAsignado($id)
    {
        $viaje = Viaje::findOrFail($id);

        return view('docente.verViajeAsignado', compact('viaje'));
    }

    public function crearEmpresas()
    {
        return view('docente.crearEmpresas');
    }

    public function datosCrearEmpresa(EmpresaRequest $request)
    {
       $nom_empresa = $request->input('nom_empresa');
       $direccion = $request->input('direccion');
       $telefono = $request->input('telefono');
       $correo = $request->input('correo');
       $contacto = $request->input('contacto');

       Empresa::create(['nom_empresa' => $nom_empresa, 'direccion' => $direccion, 'telefono' => $telefono, 'correo' => $correo, 'contacto' => $contacto]);

       Alert::success('Empresa creada exitosamente', 'Empresa creada');

       return redirect()->route('crearEmpresas');
    }

    public function listaEmpresas()
    {
        $empresas = Empresa::all();
        return view('docente.listaEmpresas', compact('empresas'));
    }

    public function infoEmpresa($id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('docente.infoEmpresa', compact('empresa'));
    }

    public function asignarEmpresasViaje()
    {
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();

        $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo_actual->id)->get();

        return view('docente.asignarEmpresasViaje', compact('viajes'));
    }

    public function asignarEmpresasViajeForm($id)
    {
        $viaje = Viaje::findOrFail($id);
        $empresas = Empresa::orderBy('nom_empresa', 'ASC')->pluck('nom_empresa', 'id');

       return view('docente.asignarEmpresasViajeForm', compact('viaje', 'empresas'));
    }

    public function datosAsignarEmpresasViaje(Request $request, $id)
    {
        if ($request->input('empresas') == null) 
      {
        Alert::warning('Por favor elige al menos una empresa', 'Elegir empresas!');
        return redirect()->back();
      }   

      $viaje = Viaje::findOrFail($id);
      $viaje->manyEmpresas()->sync($request->get('empresas', []));

      Alert::success('Las empresas fueron asignadas al viaje', 'Empresas asignadas');
      return redirect()->route('asignarEmpresasViaje'); 
  }

  public function editarEmpresasViajeForm($id)
  {
      $viaje = Viaje::findOrFail($id);
      $empresas = Empresa::orderBy('nom_empresa', 'ASC')->pluck('nom_empresa', 'id');

      return view('docente.editarEmpresasViajeForm', compact('viaje', 'empresas'));
  }

  public function datosEditarEmpresasViaje(Request $request, $id)
  {
     if ($request->input('empresas') == null) 
      {
        Alert::warning('Por favor elige al menos una empresa', 'Elegir empresas!');
        return redirect()->back();
      }   

      $viaje = Viaje::findOrFail($id);
      $viaje->manyEmpresas()->sync($request->get('empresas', []));

      Alert::success('Las empresas fueron asignadas al viaje', 'Empresas editadas');
      return redirect()->route('asignarEmpresasViaje'); 
  }

}
