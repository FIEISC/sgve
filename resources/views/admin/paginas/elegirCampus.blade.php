@extends('admin.modulos.plantilla')

@section('title', 'Elegir Campus')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Elegir campus</h1>

	<form action="{{ route('datoCampusAdmin') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<select name="campus_id" class="form-control" onchange="this.form.submit()">
				@foreach ($campus as $campu)
				<option value="">Elegir campus</option>
					<option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>

@endsection