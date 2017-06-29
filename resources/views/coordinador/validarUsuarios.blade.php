@extends('modulos.plantilla')

@section('title', 'Válidar Usuarios | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Activar usuarios</h1>

	@if (count($docentes) === 0)
		<h3 class="text-center text-danger">No hay usuarios por activar por el momento</h3>
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

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Rol</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)
				<tr>
					<td>{{ $docente->nom_docente }}</td>
					@if ($docente->rol == 1)
						<td>Director</td>
					@elseif($docente->rol == 2)
					<td>Cordinador de área</td>
					@elseif($docente->rol == 3)
					<td>Docente</td>
					@endif

					<td>
						<form action="{{ route('datoValidarUsuario', $docente->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="activo" value="1">

							<button type="submit" class="btn btn-primary btn-xs">Activar  <span class="glyphicon glyphicon-ok"></span></button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
	@endif
</div>

@endsection