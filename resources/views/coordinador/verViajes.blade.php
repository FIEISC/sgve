@extends('modulos.plantilla')

@section('title', 'Válidar Usuarios | SGVE')

@section('contenido')

<div class="col-md-8">
	<h1>Ver viajes</h1>

	<table class="table table-responsive table-hover table-bordered">
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
					<td>Acciones</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection