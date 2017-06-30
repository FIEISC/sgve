@extends('modulos.plantilla')

@section('title', 'Historial | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">

<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="{{ route('verViajesDirector') }}" class="btn btn-info btn-sm">Atrás</a>
	</div>
</div>
	<h1 class="text-center">Historial de viajes</h1>

 @if (count($viajes) === 0)
 	<h3 class="text-center text-danger">No hay viajes que mostrar por el momento</h3>
 @else
 	<table class="table table-hover table-bordered table-responsive">
		<thead>
			<tr>
				<th>Viaje</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
			    <tr>
			    	<td>{{ $viaje->nom_viaje }}</td>
			    	<td>
			    		<a href="{{ route('verViajeHistorialDirector', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a>
			    	</td>
			    </tr>
			@endforeach
		</tbody>
	</table>
 @endif
</div>

@endsection