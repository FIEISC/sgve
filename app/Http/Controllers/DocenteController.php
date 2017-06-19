<?php

namespace sgve\Http\Controllers;

use Illuminate\Http\Request;

use sgve\Http\Requests\ViajeRequest;

use sgve\Http\Requests\EmpresaRequest;

use sgve\Ciclo;

use sgve\Grupo;

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

/*Para crear un viaje primero de debe elegir el ciclo escolar actual, en caso no que no se halla creado uno, se mostrara un mensaje de alerta*/
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

        if (count($carreras) === 0) 
        {
            Alert::info('Ponerse en contacto con el administrador para registrar al menos una carrera', 'Carreras no encontradas');

            return redirect()->back();
        }

        $docentes = User::where('id', '!=', Auth::user()->id)->where('rol', '!=', 0)->where('plantel_id', '=', Auth::user()->plantel_id)->get();
        
        return view('docente.crearViaje', compact('ciclo', 'plantel', 'carreras', 'docentes'));
    }

    public function datosCrearViaje(ViajeRequest $request)
    {
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

        return redirect()->route('listaViajes');
    }

/*Muestra la lista de viajes que creo el usuario actualmente autentificado en el sistema, se pasa el id del ciclo que esta actualmente activo y tiene el id en el viaje*/

    public function listaViajes()
    { 
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();

       if ($ciclo_actual === null) 
       {
           Alert::warning('Crear ciclo escolar actual', 'Ciclo escolar no encontrado');
           return redirect()->back();
       }

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

/*Para ver a que viajes se fue asignado por otro docente que creo un viaje*/
    public function viajesAsignados()
    {
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();

        if ($ciclo_actual === null) 
       {
           Alert::warning('Crear ciclo escolar actual', 'Ciclo escolar no encontrado');
           return redirect()->back();
       }

        $viajes = Viaje::where('compa', '=', Auth::user()->nom_docente)->where('ciclo_id', '=', $ciclo_actual->id)->get();

        return view('docente.viajesAsignados', compact('viajes'));
    }

    /*Para ver la informacion del viaje al cual se fue asignado como acompañante*/
    public function verViajeAsignado($id)
    {
        $viaje = Viaje::findOrFail($id);

        return view('docente.verViajeAsignado', compact('viaje'));
    }

/*Vista del formulario para crear empresas*/
    public function crearEmpresas()
    {
        return view('docente.crearEmpresas');
    }

/*Datos recogidos del formulario para registrarlos en la bd*/
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

/*Vista para mostrar todas las empresas creadas*/
    public function listaEmpresas()
    {
        $empresas = Empresa::all();

        if (count($empresas) === 0) 
        {
           Alert::info('Registrar al menos una empresa', 'Empresas no encontradas');
           return redirect()->back();
        }

        return view('docente.listaEmpresas', compact('empresas'));
    }
/*Vista para mostrar la informacion de cada empresa*/
    public function infoEmpresa($id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('docente.infoEmpresa', compact('empresa'));
    }
/*Vista donde se muestra una tabla con los viajes creados en el ciclo actual para asi
poder asignarles empresas que se van a visitar en ese viaje*/
    public function asignarEmpresasViaje()
    {
        $ciclo_actual = Ciclo::where('activo', '=', 1)->first();
         
         if ($ciclo_actual === null) 
       {
           Alert::warning('Crear ciclo escolar actual', 'Ciclo escolar no encontrado');
           return redirect()->back();
       }

      $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo_actual->id)->get();

        return view('docente.asignarEmpresasViaje', compact('viajes'));
    }

/*Vista del formulario para asignar empresas al viaje elegido*/
    public function asignarEmpresasViajeForm($id)
    {
        $viaje = Viaje::findOrFail($id);
        $empresas = Empresa::orderBy('nom_empresa', 'ASC')->pluck('nom_empresa', 'id');

        if (count($empresas) === 0) 
        {
            Alert::warning('No hay empresas registradas', 'Registrar empresas');
            return redirect()->back();
        }

       return view('docente.asignarEmpresasViajeForm', compact('viaje', 'empresas'));
    }
/*Datos del formulario para asignar empresas al viaje elegido*/
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

/*Vista del formulario para editar la asignacion de empresas al viaje elegido*/
  public function editarEmpresasViajeForm($id)
  {
      $viaje = Viaje::findOrFail($id);
      $empresas = Empresa::orderBy('nom_empresa', 'ASC')->pluck('nom_empresa', 'id');

       if (count($empresas) === 0) 
        {
            Alert::warning('No hay empresas registradas', 'Registrar empresas');
            return redirect()->back();
        }

      return view('docente.editarEmpresasViajeForm', compact('viaje', 'empresas'));
  }
/*Datos del formulario para editar la asignacion de empresas al viaje elegido*/
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

/*Vista para elegir el viaje y asi poder crear grupos con referencia al viaje*/
  public function crearGrupos()
  {
    $ciclo = Ciclo::where('activo', '=', 1)->first();
    $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo->id)->get();

    return view('docente.crearGrupos', compact('ciclo', 'viajes'));
  }

/*Vista del formulario para crear un grupo*/
  public function crearGrupo($id)
  {
    $viaje = Viaje::findOrFail($id);

    return view('docente.crearGrupo', compact('viaje'));
  }

/*Datos del formulario para crear un grupo*/
  public function datosCrearGrupo(Request $request)
  {
    Grupo::create($request->all());

    Alert::success('El grupo fué registrado en el sistema', 'Grupo creado exitosamente');

    return redirect()->route('crearGrupos');
  }

  public function infoGrupo($id)
  {
     $grupo = Grupo::findOrFail($id);

     return view('docente.infoGrupo', compact('grupo'));
  }

}


