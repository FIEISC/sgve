@extends('modulos.plantilla')

@section('title', 'Home | SGVE')

@section('contenido')

<div class="panel panel-default">
  <div class="panel-body">

  @php
  	$fecha = date('d-m-20y');
  @endphp

<div class="row">
	<div class="col-md-3 col-md-offset-9">
		  <h3>{{ $fecha }}  <span class="glyphicon glyphicon-calendar"></span></h3>
	</div>
</div>

    <h1 class="text-center">Bienvenido {{ Auth::user()->nom_docente }}</h1>
    <hr>
    @if (Auth::user()->rol == 1)
    	<h3 class="text-center">Estas logueado como director del plantel: </h3>
    	<br>
    	<h4 class="text-center">{{ Auth::user()->plantel->nom_plantel }}</h4>
    @elseif(Auth::user()->rol == 2)
    <h3 class="text-center">Estas logueado como coordinador de área del plantel: </h3>
    	<br>
    	<h4 class="text-center">{{ Auth::user()->plantel->nom_plantel }}</h4>

    @elseif(Auth::user()->rol == 3)
    <h3 class="text-center">Estas logueado como docente del plantel: </h3>
    	<br>
    	<h4 class="text-center">{{ Auth::user()->plantel->nom_plantel }}</h4>
    @endif
  </div>
</div>

@endsection