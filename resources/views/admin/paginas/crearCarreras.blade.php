@extends('admin.modulos.plantilla')

@section('title', 'Crear Carreras')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Crear carreras</h1>

	<form action="{{ route('datosCrearCarreras') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_carrera">Nombre de la carrera</label>
			<input type="text" name="nom_carrera" class="form-control">
		</div>

		<div class="form-group">
			<label for="siglas">Siglas de la carrera</label>
			<input type="text" name="siglas" class="form-control">
		</div>

		<div class="form-group">
			<label for="grupo">Grupo</label>
			<input type="text" name="grupo" class="form-control">
		</div>

		<input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

		<button type="submit" class="btn btn-primary btn-block">Crear</button>

	</form>
</div>

@endsection