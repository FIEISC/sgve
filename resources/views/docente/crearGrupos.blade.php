@extends('modulos.plantilla')

@section('title', 'Crear Grupos | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">

<table class="table table-bordered table-hover table-responsive">
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
				<td><a href="{{ route('crearGrupo', $viaje->id) }}" class="btn btn-primary btn-xs">Crear</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
	
</div>
@endsection