@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">{{ $viaje->nom_viaje }}</h3>
		</div>
		<div class="panel-body">
			<h2 class="text-center">Información del viaje</h2>

			<h3>Motivos del viaje</h3>
			<p>{{ $viaje->motivos }}</p>

			<h3>Impacto del viaje en los alumnos</h3>
			<p>{{ $viaje->impacto }}</p>

			<h3>Fecha de salida</h3>
			<p>{{ $viaje->fec_ini }}</p>

			<h3>Fecha de regreso</h3>
			<p>{{ $viaje->fec_fin }}</p>

			<h3>Carrera</h3>
			<p>{{ $viaje->carrera->nom_carrera }}</p>
		</div>
	</div>
</div>

@endsection