@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Viajes</h1>

	<div class="row">
		<div class="col-md-2 col-md-offset-10">
			<a href="{{ route('historialViajesDirector') }}" class="btn btn-info btn-sm">Historial</a>
		</div>
	</div>

@if (count($viajes) === 0)
	<h3 class="text-center text-danger">No hay viajes por aceptar en este ciclo escolar por el momento</h3>
@else
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
					<td>
					<div style="display: inline-flex;">
						<a style="margin-right: 20px;" href="{{ route('verViajeDirector', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a>

					<form action="{{ route('aceptarViajeDirector', $viaje->id) }}" method="POST">
						{!! csrf_field() !!}
						{!! method_field('PUT') !!}

						<input type="hidden" name="aceptadoD" value="1">

						<button type="submit" class="btn btn-success btn-xs">Aceptar</button>
					</form>
					</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif
</div>

@endsection