@extends('modulos.plantilla')

@section('title', 'Empresas | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Lista de empresas</h1>

	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($empresas as $empresa)
				<tr>
					<td><a href="{{ route('infoEmpresa', $empresa->id) }}">{{ $empresa->nom_empresa }}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection