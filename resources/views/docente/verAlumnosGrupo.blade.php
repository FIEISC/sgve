@extends('modulos.plantilla')

@section('title', 'Grupos | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
  <div class="row">
    <div class="col-md-2 col-md-offset-10">
      <a href="{{ route('asignarAlumnosGrupos') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>  Atrás</a>
    </div>
  </div>

<br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Alumnos</h3>
  </div>
  <div class="panel-body">
  <h3 class="text-center">Alumnos asignados al equipo {{ $grupo->nom_grupo }}</h3>
    @foreach ($grupo->manyAlumnos as $alumno)
    	<ul>
    		<li style="list-style: none;" class="text-center">{{ $alumno->nom_alumno }}</li>
    	</ul>
    @endforeach
  </div>
</div>
</div>
@endsection