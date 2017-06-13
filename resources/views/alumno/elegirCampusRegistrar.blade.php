@extends('modulos.plantilla')

@section('title', 'Campus | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1>Elegir Campus</h1>

	<form action="{{ route('elegirPlantelRegistrar') }}" method="POST">

	{!! csrf_field() !!}
	
		<div class="form-group">
			<select name="campus_id" class="form-control" onchange="this.form.submit()">
				<option value="">Elegir campus</option>
				@foreach ($campus as $campu)
					<option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>

@endsection