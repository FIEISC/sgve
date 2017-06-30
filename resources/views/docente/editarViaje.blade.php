@extends('modulos.plantilla')

@section('title', 'Viaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

	<div class="row">
		<div class="col-md-2 col-md-offset-10">
			<a href="{{ route('listaViajes') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>  Atrás</a>
		</div>
	</div>

	<h1 class="text-center">Editar viaje</h1>

	<form action="{{ route('datosEditarViaje', $viaje->id) }}" method="POST">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group">
			<label for="nom_viaje">Nombre del viaje</label>
			<input type="text" name="nom_viaje" class="form-control" value="{{ $viaje->nom_viaje }}">
		</div>

		<div class="form-group">
			<label for="motivos">Motivos del viaje</label>
			<textarea name="motivos" id="motivos" cols="30" rows="3" class="form-control">{{ $viaje->motivos }}</textarea>
		</div>

		<div class="form-group">
			<label for="impacto">Impacto del viaje en los alumnos</label>
			<textarea name="impacto" id="impacto" cols="30" rows="3" class="form-control">{{ $viaje->impacto }}</textarea>
		</div>

		<div class="form-group">
			<label for="fec_ini">Fecha de salida</label>
			<input type="text" name="fec_ini" class="form-control datepicker" value="{{ $viaje->fec_ini }}">
		</div>

		<div class="form-group">
			<label for="fec_fin">Fecha de regreso</label>
			<input type="text" name="fec_fin" class="form-control datepicker" value="{{ $viaje->fec_fin }}">
		</div>

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
			<label for="compa">Docente acompañante</label>
			<select name="compa" id="compa" class="form-control">
				<option value="">Elegir docente</option>
				<option value="Ninguno">Ninguno</option>
				@foreach ($docentes as $docente)
					<option value="{{ $docente->nom_docente }}">{{ $docente->nom_docente }}</option>
				@endforeach
			</select>
		</div>
     
     <button type="submit" class="btn btn-primary btn-block">Editar</button>
	</form>
</div>
@endsection