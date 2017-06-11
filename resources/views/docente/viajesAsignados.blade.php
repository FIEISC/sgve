@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Viajes asignados</h1>

	@if (count($viajes) === 0)
		<h4 class="text-center">No has sido asignado como acompañante de ningún viaje en este ciclo escolar por el momento</h4>
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
				<th>Viaje</th>
				<th>creador</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
				<tr>
					<td>{{ $viaje->nom_viaje }}</td>
					<td>{{ $viaje->user->nom_docente }}</td>
					<td><a href="{{ route('verViajeAsignado', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

@endsection