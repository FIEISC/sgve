@extends('modulos.plantilla')

@section('title', 'Crear Empresa | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="col-md-2 col-md-offset-10">
	<a href="{{ route('listaEmpresas') }}" class="btn btn-primary btn-xs">Empresas</a>
</div>
	<h1 class="text-center">Crear empresa</h1>

	<form action="{{ route('datosCrearEmpresa') }}" method="POST">
	
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_empresa">Nombre de la empresa</label>
			<input type="text" name="nom_empresa" class="form-control">
		</div>

		<div class="form-group">
			<label for="direccion">Dirección de la empresa</label>
			<input type="text" name="direccion" class="form-control">
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono de la empresa</label>
			<input type="text" name="telefono" class="form-control">
		</div>

		<div class="form-group">
			<label for="correo">Correo de la empresa</label>
			<input type="text" name="correo" class="form-control">
		</div>

		<div class="form-group">
			<label for="contacto">Contacto de la empresa</label>
			<input type="text" name="contacto" class="form-control">
		</div>

        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
	</form>
</div>

@endsection