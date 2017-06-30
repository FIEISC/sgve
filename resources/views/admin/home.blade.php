@extends('admin.modulos.plantilla')

@section('title', 'Home Admin')

@section('contenido')

<h1>Bienvenido administrador {{ Auth::user()->nom_docente }}</h1>

@endsection