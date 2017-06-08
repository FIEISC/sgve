@extends('modulos.plantilla')

@section('title', 'Crear Viaje | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Crear Viaje</h1>

	<p>{{ $ciclo->nom_ciclo }}</p>

	<form action="" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			
		</div>
	</form>
</div>

@endsection