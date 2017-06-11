@extends('modulos.plantilla')

@section('title', 'Home | SGVE')

@section('contenido')

<div class="panel panel-default">
  <div class="panel-body">
    <h1 class="text-center">Bienvenido {{ Auth::user()->nom_docente }}</h1>
  </div>
</div>

@endsection