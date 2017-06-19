@extends('modulos.plantilla')

@section('title', 'Crear Grupos | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

		<h1>Crear Grupo de viaje</h1>

	<form action="{{ route('datosCrearGrupo') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_grupo">Nombre del grupo</label>
			<input type="text" name="nom_grupo" class="form-control">
		</div>

<label>Semestre</label>
		@if ($viaje->ciclo->ciclo === 1)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="3">3</option>
				<option value="5">5</option>
			</select>
		</div>

		@elseif($viaje->ciclo->ciclo === 2)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="4">4</option>
				<option value="6">6</option>
			</select>
		</div>
		@endif

		<input type="hidden" name="viaje_id" value="{{ $viaje->id }}">
		<input type="hidden" name="ciclo_id" value="{{ $viaje->ciclo_id }}">
		<input type="hidden" name="carrera_id" value="{{ $viaje->carrera_id }}">
		<input type="hidden" name="plantel_id" value="{{ $viaje->plantel_id }}">

		<button type="submit" class="btn btn-primary btn-block">Registrar</button>
	</form>
</div>
@endsection