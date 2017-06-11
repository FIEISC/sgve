@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1  class="text-center">Lista de viajes</h1>

	@if (count($viajes) === 0)
		<h3 class="text-center">No tienes viajes creados en este ciclo escolar por el momento.</h3>

	@else
	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre del viaje</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
				<tr>
					<td>{{ $viaje->nom_viaje }}</td>
					<td>
						<a href="{{ route('verViaje', $viaje->id) }}" class="btn btn-primary btn-xs">Ver </a>

						<a href="{{ route('editarViaje', $viaje->id) }}" class="btn btn-warning btn-xs">Editar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>
@endsection