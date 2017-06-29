@extends('modulos.plantilla')

@section('title', 'Registro | SGVE')

@section('contenido')


<div class="col-md-6 col-md-offset-3">

<h1 class="text-center">Registro</h1>

<form action="{{ route('datosRegistro') }}" method="POST">

{!! csrf_field() !!}
  
  <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Nombre completo</div>
      <input type="text" class="form-control" name="nom_docente" id="no_cuenta" placeholder="">
    </div>
  </div>

    <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> No. Cuenta</div>
      <input type="text" class="form-control" name="no_cuenta" id="no_cuenta" placeholder="">
    </div>
  </div>

    <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Correo</div>
      <input type="text" class="form-control" name="email" id="no_cuenta" placeholder="">
    </div>
  </div>

  <div class="form-group">
    {{-- <label for="no_cuenta">Número de cuenta</label> --}}
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Contraseña</div>
      <input type="password" class="form-control" name="password" id="no_cuenta" placeholder="">
    </div>
  </div>

@if((count($director) === 1) && (count($coordinador) === 1))
<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="3">
    Docente
  </label>
</div>

@elseif (count($director) === 1)
 <div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="2">
    Coordinador de vinculación
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="3">
    Docente
  </label>
</div>

@elseif(count($coordinador) === 1)

<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="1">
    Director
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="3">
    Docente
  </label>
</div>

@else
<div class="form-group">
    <div class="radio">
      <label>
        <input type="radio" name="rol" id="" value="1">
        Director
      </label>
    </div>

<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="2">
    Coordinador de vinculación
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="rol" id="" value="3">
    Docente
  </label>
</div>
  </div> 
@endif
  

  <input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

  <button type="submit" class="btn btn-primary btn-block">Registrarse</button>

</form>

</div>

@endsection