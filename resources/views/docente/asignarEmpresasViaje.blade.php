@extends('modulos.plantilla')

@section('title', 'Asignar Empresas | SGVE')

@section('contenido')

<div class="col-md-10 col-md-offset-1">
	
	<h1>Asignar empresas al viaje</h1>

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Viaje</th>
				<th>Empresas</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($viajes as $viaje)
				<tr>
					<td>{{ $viaje->nom_viaje }}</td>

					<td>
						@if (count($viaje->manyEmpresas) === 0)
						<p>No hay empresas asignadas</p>

						@else
						@foreach ($viaje->manyEmpresas as $empresa)
						<ul>
						<li style="list-style: none;">{{ $empresa->nom_empresa }}</li>
						</ul>
						@endforeach
						@endif
					</td>
					<td>
						<a href="{{ route('asignarEmpresasViajeForm', $viaje->id) }}" class="btn btn-success btn-xs">Asignar</a>

						<a href="{{ route('editarEmpresasViajeForm', $viaje->id) }}" class="btn btn-warning btn-xs">Editar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection