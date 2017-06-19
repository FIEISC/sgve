@extends('modulos.plantilla')

@section('title', 'Info Grupo | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

	<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">Grupo</h3>
		</div>
		<div class="panel-body">
			<h3>Nombre del grupo</h3>
			<p>{{ $grupo->nom_grupo }}</p>
			<h3>Viaje asignado</h3>
			<p>{{ $grupo->viaje->nom_viaje }}</p>
			<h3>Carrera</h3>
			<p>{{ $grupo->carrera->nom_carrera }}</p>
			<h3>Semestre</h3>
			<p>{{ $grupo->semestre }}</p>
		</div>
	</div>
</div>

@endsection