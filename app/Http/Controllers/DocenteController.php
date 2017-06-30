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

use sgve\Alumno;

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

        $docentes = User::where('id', '!=', Auth::user()->id)->where('rol', '!=', 0)->where('rol', '!=', 1)->where('plantel_id', '=', Auth::user()->plantel_id)->get();
        
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
        $docentes = User::where('id', '!=', Auth::user()->id)->where('rol', '!=', 0)->where('rol', '!=', 1)->where('plantel_id', '=', Auth::user()->plantel_id)->get();

        $carreras = Carrera::where('plantel_id', '=', Auth::user()->plantel_id)->get();

        if (count($carreras) === 0) 
        {
            Alert::info('Ponerse en contacto con el administrador para registrar al menos una carrera', 'Carreras no encontradas');

            return redirect()->back();
        }
        
        return view('docente.editarViaje', compact('viaje', 'docentes', 'carreras'));
    }

    public function datosEditarViaje(Request $request, $id)
    {

        $nom_viaje = $request->input('nom_viaje');
        $motivos = $request->input('motivos');
        $impacto = $request->input('impacto');
        $fec_ini = $request->input('fec_ini');
        $fec_fin = $request->input('fec_fin');
        $carrera_id = $request->input('carrera_id');
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
            'carrera_id' => $carrera_id,
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

    /*Para crear reporte del viaje despues de que acabe*/

    public function listaReporteViaje()
    {
       $ciclo_actual = Ciclo::where('activo', '=', 1)->first();

       if ($ciclo_actual === null) 
       {
           Alert::warning('Crear ciclo escolar actual', 'Ciclo escolar no encontrado');
           return redirect()->back();
       }

        $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo_actual->id)->where('aceptadoC', '=', 1)->where('aceptadoD', '=', 1)->get();

      return view('docente.listaViajesReporte', compact('viajes'));
    }
/*Formuñlario para crear el reporte del viaje*/
    public function reporteViajeForm($id)
    {
      $viaje = Viaje::findOrFail($id);

      return view('docente.reporteViajeForm', compact('viaje'));
    }

    /*Datos del formulario del reporte del viaje*/

    public function datoReporteViaje(Request $request, $id)
    {
      
      $this->validate($request, [
        'imagen1' => 'required',
        'imagen2' => 'required',
        'imagen3' => 'required',
        'imagen4' => 'required',
        'imagen5' => 'required',
        'reporte' => 'required'
        ]);

     /* dd($request->file('imagen1')->store('public'));*/
    
     $imagen1 = $request->file('imagen1')->store('public');
     $imagen2 = $request->file('imagen2')->store('public');
     $imagen3 = $request->file('imagen3')->store('public');
     $imagen4 = $request->file('imagen4')->store('public');
     $imagen5 = $request->file('imagen5')->store('public');

      $reporte = $request->input('reporte');

      DB::table('viajes')->where('id', $id)->update(['reporte' => $reporte, 'imagen1' => $imagen1, 'imagen2' => $imagen2, 'imagen3' => $imagen3, 'imagen4' => $imagen4, 'imagen5' => $imagen5]);

      Alert::success('Se ha registrado el reporte del viaje', 'Reporte creado');
      return redirect()->route('listaReporteViaje');

    }

    /*Para editar el reporte del viaje*/

    public function editarReporteViajeForm($id)
    {
      $viaje = Viaje::findOrFail($id);

      return view('docente.editarReporteViajeForm', compact('viaje'));
    }

    public function datoEditarReporteViaje(Request $request, $id)
    {
/*      $this->validate($request, [
      'imagen1' => 'required',
        'imagen2' => 'required',
        'imagen3' => 'required',
        'imagen4' => 'required',
        'imagen5' => 'required',
        'reporte' => 'required'
        ]);
*/
/*dd($request->all());*/

 if ($request->hasFile('imagen1') || $request->hasFile('imagen2') || $request->hasFile('imagen3') || $request->hasFile('imagen4') || $request->hasFile('imagen5')) 
{
       $imagen1 = $request->file('imagen1')->store('public');
       $imagen2 = $request->file('imagen2')->store('public');
       $imagen3 = $request->file('imagen3')->store('public');
       $imagen4 = $request->file('imagen4')->store('public');
       $imagen5 = $request->file('imagen5')->store('public');

        $reporte = $request->input('reporte');

      DB::table('viajes')->where('id', $id)->update(['reporte' => $reporte, 'imagen1' => $imagen1, 'imagen2' => $imagen2, 'imagen3' => $imagen3, 'imagen4' => $imagen4, 'imagen5' => $imagen5]);

      Alert::success('Se ha editado el reporte del viaje', 'Reporte editado');
      return redirect()->route('listaReporteViaje');
     }

  else
{

      $reporte = $request->input('reporte');
      DB::table('viajes')->where('id', $id)->update(['reporte' => $reporte]);

      Alert::success('Se ha editado el reporte del viaje', 'Reporte editado');
      return redirect()->route('listaReporteViaje');
}

}

    public function verReporteViaje($id)
    {
       $viaje = Viaje::findOrFail($id);

       if ($viaje->reporte === null) 
       {
         Alert::info('No se ha creado el reporte del viaje', 'Reporte no creado');
         return redirect()->back();
       }
       return view('docente.verReporteViaje', compact('viaje'));
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

  public function asignarAlumnosGrupos()
  {
    $ciclo_actual = Ciclo::where('activo', '=', 1)->first();
    $viajes = Viaje::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->where('ciclo_id', '=', $ciclo_actual->id)->get();

    return view('docente.asignarAlumnosGrupos', compact('viajes'));
  }

  public function elegirViajeAsignarAlumnosGrupos($id)
  {
    $viaje = Viaje::findOrFail($id);
    $grupos = Grupo::where('viaje_id', '=', $viaje->id)->get();

    return view('docente.gruposAsignarAlumnos', compact('grupos'));
  }

  public function asignarAlumnosGruposForm($id)
  {
    $grupo = Grupo::findOrFail($id);
    $alumnos = Alumno::where('semestre', '=', $grupo->semestre)->where('plantel_id', '=', $grupo->plantel_id)->where('carrera_id', '=', $grupo->carrera_id)->orderBy('nom_alumno', 'ASC')->pluck('nom_alumno', 'id');

    if (count($alumnos) === 0) 
    {
      Alert::warning('No hay alumnos registrados', 'Registrar alumnos');
      return redirect()->back();
    }

    return view('docente.asignarAlumnosGruposForm', compact('grupo', 'alumnos'));
  }

  public function datosAsignarAlumnosGrupos(Request $request, $id)
  {
    if ($request->input('alumnos') === null) 
    {
      Alert::warning('Por favor elige al menos un alumno', 'Elegir alumnos');
      return redirect()->back();
    }

    $grupo = Grupo::findOrFail($id);
    $grupo->manyAlumnos()->sync($request->get('alumnos', []));

     Alert::success('Los alumnos fueron asignados al grupo', 'Alumnos asignados');
      return redirect()->route('asignarAlumnosGrupos'); 
  }

  public function editarAlumnosGruposForm($id)
  {
    $grupo = Grupo::findOrFail($id);
    $alumnos = Alumno::where('semestre', '=', $grupo->semestre)->where('plantel_id', '=', $grupo->plantel_id)->where('carrera_id', '=', $grupo->carrera_id)->orderBy('nom_alumno', 'ASC')->pluck('nom_alumno', 'id');

    if (count($alumnos) === 0) 
    {
      Alert::warning('No hay alumnos registrados', 'Registrar alumnos');
      return redirect()->back();
    }

    return view('docente.editarAlumnosGruposForm', compact('grupo', 'alumnos'));
  }

  public function datosEditarAlumnosGrupos(Request $request, $id)
  {
    if ($request->input('alumnos') === null) 
    {
      Alert::warning('Por favor elige al menos un alumno', 'Elegir alumnos');
      return redirect()->back();
    }

    $grupo = Grupo::findOrFail($id);
    $grupo->manyAlumnos()->sync($request->get('alumnos', []));

     Alert::success('Los alumnos fueron modificados al grupo', 'Alumnos modificados');
      return redirect()->route('asignarAlumnosGrupos'); 
  }

/*Para ver la lista de alumnos que tiene el grupo elegido*/
  public function verAlumnosGrupo($id)
  {
     $grupo = Grupo::findOrFail($id);
     return view('docente.verAlumnosGrupo', compact('grupo'));
  }

}
