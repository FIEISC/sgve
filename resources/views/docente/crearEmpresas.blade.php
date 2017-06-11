@extends('modulos.plantilla')

@section('title', 'Crear Empresa | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1>Crear empresa</h1>

	<form action="" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_empresa">Nombre de la empresa</label>
			<input type="text" name="nom_empresa" class="form-control">
		</div>
	</form>
</div>

@endsection