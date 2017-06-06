@extends('modulos.plantilla')

@section('title', 'Registro | SGVE')

@section('contenido')


<div class="col-md-6 col-md-offset-3">

<h1>Registro</h1>

<form action="" method="POST">

{!! csrf_field() !!}
  
  <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Nombre completo</div>
      <input type="text" class="form-control" id="no_cuenta" placeholder="">
    </div>
  </div>

    <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> No. Cuenta</div>
      <input type="text" class="form-control" id="no_cuenta" placeholder="">
    </div>
  </div>

    <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Correo</div>
      <input type="text" class="form-control" id="no_cuenta" placeholder="">
    </div>
  </div>

  <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Contraseña</div>
      <input type="text" class="form-control" id="no_cuenta" placeholder="">
    </div>
  </div>

</form>

</div>

@endsection