@extends('admin.modulos.plantilla')

@section('title', 'Válidar Usuarios')

@section('contenido')

<div class="col-md-10 col-md-offset-1">
	<h1 class="text-center">Válidar usuarios</h1>

	@if (count($docentes) === 0)
		<h3 class="text-center text-danger">No hay usuarios por activar en el sistema</h3>
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
				<td>Campus</td>
				<td>{{ $docente->plantel->nom_plantel }}</td>
				
				@if ($docente->rol == 1)
					<td>Director</td>
					@elseif($docente->rol == 2)
					<td>Coordinador de área</td>
					@elseif($docente->rol == 3)
					<td>Docente</td>
				@endif
				<td>
					<form action="{{ route('datoActivarUsuario', $docente->id) }}" method="POST">
						{!! csrf_field() !!}
						{!! method_field('PUT') !!}

						<input type="hidden" value="1" name="activo">

						<button type="submit" class="btn btn-primary btn-xs">Activar <span class="glyphicon glyphicon-ok"></span></button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

@endsection