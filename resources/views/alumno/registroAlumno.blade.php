@extends('modulos.plantilla')

@section('title', 'Registro | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1 class="text-center">Registro Alumno</h1>

<form action="{{ route('datosRegistroAlumno') }}" method="POST">

	{!! csrf_field() !!}

	<div class="form-group">
		<label for="nom_alumno">Nombre completo</label>
		<input type="text" name="nom_alumno" class="form-control">
	</div>

	<div class="form-group">
		<label for="no_cuenta">Número de cuenta</label>
		<input type="text" name="no_cuenta" class="form-control">
	</div>

	<div class="form-group">
		<label for="nom_padre">Nombre del padre o tutor</label>
		<input type="text" name="nom_padre" class="form-control">
	</div>

	<div class="form-group">
		<label for="tel_padre">Teléfono del padre o tutor</label>
		<input type="text" name="tel_padre" class="form-control">
	</div>

	<div class="form-group">
		<label for="no_imss">Número de IMSS</label>
		<input type="text" name="no_imss" class="form-control">
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

	<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
</div>

@endsection