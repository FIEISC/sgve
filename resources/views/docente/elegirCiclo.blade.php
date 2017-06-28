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
				<td><a href="{{ route('crearViaje', $ciclo->id) }}" class="btn btn-success btn-sm">Crear</a></td>
			</tr>
		</tbody>
	</table>

	<div class="alert alert-info" role="alert"> <span class="glyphicon glyphicon-asterisk"></span>  Si el ciclo escolar no coincide con el ciclo actual, por favor ponerse en contacto con el administrador</div>

	<br>
</div>

@endsection