@extends('modulos.plantilla')

@section('title', 'Viaje | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="">Atras</a>
	</div>
</div>
	<h1 class="text-center">Viajes</h1>

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Viaje</th>
				<th>Carrera</th>
				<th>Ciclo</th>
				<th>Acciones</th>
			</tr>
		</thead>
        
        <tbody>
        	@foreach ($viajes as $viaje)
        		<tr>
        			<td>{{ $viaje->nom_viaje }}</td>
        			<td>{{ $viaje->carrera->nom_carrera }}</td>
        			<td>{{ $viaje->ciclo->nom_ciclo }}</td>
        			<td>
        				<a href="{{ route('infoViajeHistorial', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a>
        			</td>
        		</tr>
        	@endforeach
        </tbody>

	</table>
</div>

@endsection