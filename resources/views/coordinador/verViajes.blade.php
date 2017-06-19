@extends('modulos.plantilla')

@section('title', 'Viajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Ver viajes</h1>

    @if (count($viajes) === 0)
    	<h3 class="text-center">No hay viajes registrados en este ciclo escolar por el momento</h3>

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
						<a href="{{ route('verViajeCoordinador', $viaje->id) }}" class="btn btn-primary btn-xs">Ver</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
    @endif
</div>

@endsection