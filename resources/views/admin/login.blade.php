@extends('admin.modulos.plantilla')

@section('title', 'Login Admin')

@section('contenido')

<div class="col-md-6 col-md-offset-3" style="margin-top: 100px;">
<h1 class="text-center">Login admin</h1>
	<form action="{{ route('datosLoginAdmin') }}" method="POST">

	{!! csrf_field() !!}
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">Número de cuenta</div>
				<input type="text" class="form-control" name="no_cuenta" id="no_cuenta" placeholder="">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">Contraseña</div>
				<input type="password" class="form-control" name="password" id="password" placeholder="">
			</div>
		</div>

		<button type="submit" class="btn btn-primary btn-block">Entrar</button>
	</form>
    <br>
	<p>Regresar al login <a href="{{ route('login') }}">principal</a></p>
</div>

@endsection