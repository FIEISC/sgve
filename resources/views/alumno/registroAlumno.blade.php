@extends('modulos.plantilla')

@section('title', 'Planteles | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1>Elegir Plantel</h1>

	<form action="{{ route('registroAlumno') }}" method="POST">

	{!! csrf_field() !!}
	
		<div class="form-group">
			<select name="plantel_id" class="form-control" onchange="this.form.submit()">
				<option value="">Elegir plantel</option>
				@foreach ($planteles as $plantel)
					<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>

@endsection