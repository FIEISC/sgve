@extends('admin.modulos.plantilla')

@section('title', 'Válidar Usuarios')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1>Válidar usuarios</h1>

	<table class="table table-bordered table-hover table-responsive">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Campus</th>
				<th>Plantel</th>
				<th>Rol</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)
			<tr>
				<td>{{ $docente->nom_docente }}</td>
				<td>{{ $docente->rol }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection