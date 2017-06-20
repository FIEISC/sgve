@extends('modulos.plantilla')

@section('title', 'Registro | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1 class="text-center">Registro Alumno</h1>

<form action="{{ route('datosRegistroAlumno') }}" method="POST">

	{!! csrf_field() !!}

	<div class="form-group{{ $errors->has('nom_alumno') ? ' has-error' : '' }}">
		<label for="nom_alumno">Nombre completo</label>
		<input type="text" name="nom_alumno" class="form-control">

		@if ($errors->has('nom_alumno'))
			<span class="help-block">{{ $errors->first('nom_alumno') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('no_cuenta') ? ' has-error' : '' }}">
		<label for="no_cuenta">Número de cuenta</label>
		<input type="text" name="no_cuenta" class="form-control">

		@if ($errors->has('no_cuenta'))
			<span class="help-block">{{ $errors->first('no_cuenta') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('nom_padre') ? ' has-error' : '' }}">
		<label for="nom_padre">Nombre del padre o tutor</label>
		<input type="text" name="nom_padre" class="form-control">

		@if ($errors->has('nom_padre'))
			<span class="help-block">{{ $errors->first('nom_padre') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('tel_padre') ? ' has-error' : '' }}">
		<label for="tel_padre">Teléfono del padre o tutor</label>
		<input type="text" name="tel_padre" class="form-control">

		@if ($errors->has('tel_padre'))
			<span class="help-block">{{ $errors->first('tel_padre') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('no_imss') ? ' has-error' : '' }}">
		<label for="no_imss">Número de IMSS</label>
		<input type="text" name="no_imss" class="form-control">

		@if ($errors->has('no_imss'))
			<span class="help-block">{{ $errors->first('no_imss') }}</span>
		@endif
	</div>

	<input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

	<div class="form-group">
		<select name="carrera_id" class="form-control">
			<option value="">Elegir carrera</option>
			@foreach ($carreras as $carrera)
			   <option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
			@endforeach
		</select>
	</div>

	@if ($ciclo->ciclo === 1)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="3">3</option>
				<option value="5">5</option>
			</select>
		</div>
	@elseif($ciclo->ciclo === 2)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="4">4</option>
				<option value="6">6</option>
			</select>
		</div>
	@endif

	<p><b>Nota: Recuerda que tienes que aceptar el reglamento y las condiciones de viaje o de lo contrario no podrás participar en los viajes estudiantiles</b></p>

	<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
</div>

@endsection