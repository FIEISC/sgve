@extends('modulos.plantilla')

@section('title', 'Crear Viaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Elegir ciclo</h1>

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Ciclo</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{{ $ciclo->nom_ciclo }}</td>
				<td><a href="{{ route('crearViaje', $ciclo->id) }}" class="btn btn-success btn-xs">Crear</a></td>
			</tr>
		</tbody>
	</table>
</div>

@endsection