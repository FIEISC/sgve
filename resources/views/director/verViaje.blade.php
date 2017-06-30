@extends('modulos.plantilla')

@section('title', 'Viajes')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="{{ route('verViajesDirector') }}" class="btn btn-info btn-sm">Atras</a>
	</div>
</div>
<br>
	<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">Viaje</h3>
		</div>
		<div class="panel-body">
			<h3>Nombre del viaje</h3>
			<p>{{ $viaje->nom_viaje }}</p>
			<h3>Motivos del viaje</h3>
			<p>{{ $viaje->motivos }}</p>
			<h3>Impacto del viaje</h3>
			<p>{{ $viaje->impacto }}</p>
			<h3>Fecha de salida</h3>
			<p>{{ $viaje->fec_ini }}</p>
			<h3>Fecha de regreso</h3>
			<p>{{ $viaje->fec_fin }}</p>
			<h3>Docente acompañante</h3>
			<p>{{ $viaje->compa }}</p>
			<h3>Docente creador del viaje</h3>
			<p>{{ $viaje->user->nom_docente }}</p>
			<h3>Carrera</h3>
			<p>{{ $viaje->carrera->nom_carrera }}</p>

			<h3>Empresas a visitar</h3>

			@if (count($viaje->manyEmpresas) === 0)
				<p>No tiene empresas asignadas por el momento</p>
			@else
			@foreach ($viaje->manyEmpresas as $empresa)
			<ul>
				<li style="list-style: none;">{{ $empresa->nom_empresa }}</li>
			</ul>
			@endforeach
			@endif
            
            <h3>Grupos que viajaran</h3>
			@if (count($viaje->grupos) === 0)
				<p>No tiene grupos asigandos por el momento</p>
			@else
			@foreach ($viaje->grupos as $grupo)
				<ul>
					<li style="list-style: none;">{{ $grupo->nom_grupo }}</li>
				</ul>
			@endforeach
			@endif
		</div>
	</div>
</div>

@endsection