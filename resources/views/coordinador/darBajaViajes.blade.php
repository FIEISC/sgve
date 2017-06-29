@extends('modulos.plantilla')

@section('title', 'Baja viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Dar de baja viajes</h1>

   @if (count($viajes) === 0)
   	<h3 class="text-center text-danger">Solo aparecerán los viajes que hallan sido aceptador por usted y el director del plantel y el reporte del viaje halla sido capturado.</h3>

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
				<th>Creador</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
				<tr>
					<td>{{ $viaje->nom_viaje }}</td>
					<td>{{ $viaje->user->nom_docente }}</td>
					<td>
						<div style="display: inline-flex;">
							<a style="margin-right: 10px;" href="{{ route('verViajeCompleto', $viaje->id) }}" class="btn btn-success btn-sm">Ver Viaje</a>

						<form action="{{ route('darBajaViaje', $viaje->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="activo" value="0">

							<button type="submit" class="btn btn-danger btn-sm">Baja</button>
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