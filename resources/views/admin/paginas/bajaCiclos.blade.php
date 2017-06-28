@extends('admin.modulos.plantilla')

@section('title', 'Baja ciclo')

@section('contenido')

@php
	$fecha = date('20y-m-d');
	$mi_fecha = '2017-07-01';
@endphp

<div class="col-md-6 col-md-offset-3">
	<h1>Dar de baja ciclo</h1>

	@if (count($ciclos) === 0)
		<h3 class="text-center text-danger">No has ciclo escolar por dar de baja en este momento</h3>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @else
    <table class="table table-hover table-responsive table-bordered">
		<thead>
			<tr>
				<th>Ciclo</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ciclos as $ciclo)
				<tr>
					<td>{{ $ciclo->nom_ciclo }}</td>
				    <td>
				    @if ($fecha > $ciclo->fec_fin)
						<form action="{{ route('datoBajaCiclo', $ciclo->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="activo" value="0">

							<button type="submit" class="btn btn-danger btn-xs">Baja</button>
						</form>
					@else
					<button class="btn btn-info btn-xs">Ciclo no terminado...</button>
					@endif
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	@endif
</div>

@endsection