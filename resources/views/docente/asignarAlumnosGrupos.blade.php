@extends('modulos.plantilla')

@section('title', 'Asignar Alumnos | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1>Asignar Alumnos a los grupos de viaje</h1>

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
</div>

@endsection