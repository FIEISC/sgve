@extends('modulos.plantilla')

@section('title', 'Grupos | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

	<h1>Grupos</h1>

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Grupo</th>

				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($grupos as $grupo)
				<tr>
					<td><a href="{{ route('verAlumnosGrupo', $grupo->id) }}">{{ $grupo->nom_grupo }}</a></td>
					<td>
						<a href="{{ route('asignarAlumnosGruposForm', $grupo->id) }}" class="btn btn-primary btn-xs">Asignar</a>
						<a href="{{ route('editarAlumnosGruposForm', $grupo->id) }}" class="btn btn-warning btn-xs">Editar</a>

						<a href="{{ route('verAlumnosGrupo', $grupo->id) }}" class="btn btn-success btn-xs">Ver</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection