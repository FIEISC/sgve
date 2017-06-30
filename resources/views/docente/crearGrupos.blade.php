@extends('modulos.plantilla')

@section('title', 'Crear Grupos | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
<h1 class="text-center">Elegir viaje para asignar los grupos de viaje</h1>

@if (count($viajes) === 0)
	<h3 class="text-center">No hay viajes creados en este ciclo escolar por el momento</h3>

@else
<table class="table table-bordered table-hover table-responsive">
	<thead>
		<tr>
			<th>Viaje</th>
			<th>Grupos</th>
			<th>Acción</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($viajes as $viaje)
			<tr>
				<td>{{ $viaje->nom_viaje }}</td>
				<td>
					@foreach ($viaje->grupos as $grupo)
						<ul>
							<li style="list-style: none;"><a href="{{ route('infoGrupo', $grupo->id) }}">{{ $grupo->nom_grupo }}</a></li>
						</ul>
					@endforeach
				</td>
				<td><a href="{{ route('crearGrupo', $viaje->id) }}" class="btn btn-primary btn-xs">Crear</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endif
</div>
@endsection