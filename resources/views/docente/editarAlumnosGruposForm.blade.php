@extends('modulos.plantilla')

@section('title', 'Asignar | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="row">
		<div class="col-md-2 col-md-offset-10">
			<a href="{{ route('asignarAlumnosGrupos') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>  Atrás</a>
		</div>
</div>

  <h1 class="text-center">Asignar alumnos</h1>

<p>{{ $grupo->nom_viaje }}</p>

{!! Form::model($grupo, ['route' => ['datosEditarAlumnosGrupos', $grupo->id], 'method' => 'PUT']) !!}

  <div>
    {!! Form::label('alumnos', 'Alumnos:') !!}
    <br>
    {!! Form::select('alumnos[]', $alumnos, null, ['multiple', 'class' => 'form-control']) !!}
  </div>
<br>
    {!! Form::submit('Asignar',['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!}
</div>
@endsection