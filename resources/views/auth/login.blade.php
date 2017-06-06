@extends('modulos.plantilla')

@section('title', 'Login | SGVE')

@section('contenido')


<div class="col-md-6 col-md-offset-3">

<h1>Login</h1>
	<form action="" method="POST">

	{!! csrf_field() !!}

  <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> No. Cuenta</div>
      <input type="text" class="form-control" id="no_cuenta" placeholder="">
    </div>
  </div>

  <div class="form-group">
    {{-- <label for="password">Contraseña</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span> Contraseña</div>
      <input type="password" class="form-control" id="password" placeholder="">
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-block">Entrar</button>
</form>
</div>

@endsection