@extends('modulos.plantilla')

@section('title', 'Crear Viaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Crear Viaje</h1>

	<form action="{{ route('datosCrearViaje') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_viaje">Nombre del viaje</label>
			<input type="text" name="nom_viaje" class="form-control">
		</div>

		<div class="form-group">
			<label for="motivos">Motivos del viaje</label>
			<textarea name="motivos" id="motivos" cols="30" rows="3" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="impacto">Impacto del viaje</label>
			<textarea name="impacto" id="impacto" cols="30" rows="3" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="fec_ini">Fecha de salida</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</div>
				<input type="text" class="form-control datepicker" name="fec_ini">
			</div>
		</div>

		<div class="form-group">
			<label for="fec_fin">Fecha de regreso</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</div>
				<input type="text" class="form-control datepicker" name="fec_fin">
			</div>
		</div>

{{-- 		@if ($ciclo->ciclo == 1)
			<div class="form-group">
				<label for="semestre">Semestre</label>
				<select name="semestre" id="semestre" class="form-control">
					<option value="3">3</option>
					<option value="5">5</option>
				</select>
			</div>
		@elseif($ciclo->ciclo == 2)
			<div class="form-group">
				<label for="semestre">Semestre</label>
				<select name="semestre" id="semestre" class="form-control">
				    <option value="">Elegir Semestre</option>
					<option value="4">4</option>
					<option value="6">6</option>
				</select>
			</div>
		@endif --}}

		<div class="form-group">
		<label for="carrera">Carrera</label>
			<select name="carrera_id" id="carrera" class="form-control">
			    <option value="">Elegir carrera</option>
				@foreach ($carreras as $carrera)
					<option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
				@endforeach
			</select>
		</div>

        <div class="form-group">
        	<label for="compa">Compañero docente</label>
        	<select name="compa" id="compa" class="form-control">
        		<option value="">Elegir docente acompañante</option>
        		@foreach ($docentes as $docente)
        			<option value="{{ $docente->nom_docente }}">{{ $docente->nom_docente }}</option>
        		@endforeach
        	</select>
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <input type="hidden" name="ciclo_id" value="{{ $ciclo->id }}">

        <input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

        <button type="submit" class="btn btn-primary btn-block">Crear</button>

	</form>
</div>

@endsection