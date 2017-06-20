@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">

<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="{{ route('historialViajes') }}" class="btn btn-primary btn-sm">Historial de viajes</a>
	</div>
</div>
	<h1 class="text-center">Ver viajes</h1>

    @if (count($viajes) === 0)
    	<h3 class="text-center">No hay viajes registrados en este ciclo escolar por el momento</h3>
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
    	<table id="myTable" class="table table-responsive table-hover table-bordered">
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
							<a style="margin-right: 20px;" href="{{ route('verViajeCoordinador', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a>

							<form action="{{ route('aceptarViajeCoordinador', $viaje->id) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}

								<input type="hidden" name="aceptadoC" value="1">

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