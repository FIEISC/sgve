@extends('modulos.plantilla')

@section('title', 'Asignar Alumnos | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Asignar Alumnos a los grupos de viaje</h1>

	@if (count($viajes) === 0)
		<h3 class="text-center">No hay viajes creados en este ciclo escolar por el momento</h3>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	@else
	<table class="table table-hover table-responsive table-bordered">
		<thead>
			<tr>
				<th>Viaje</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
				<tr>
					<td>{{ $viaje->nom_viaje }}</td>
					<td>
						<a href="{{ route('elegirViajeAsignarAlumnosGrupos', $viaje->id) }}" class="btn btn-primary btn-xs">Elegir</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

@endsection