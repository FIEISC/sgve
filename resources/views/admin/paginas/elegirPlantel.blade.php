@extends('admin.modulos.plantilla')

@section('title', 'Elegir Plantel')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Elegir plantel</h1>

	<form action="{{ route('crearCarreras') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<select name="plantel_id" class="form-control" onchange="this.form.submit()">
				@foreach ($planteles as $plantel)
				<option value="">Elegir plantel</option>
					<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>

@endsection