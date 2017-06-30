@extends('modulos.plantilla')

@section('title', 'Opciones Alumno | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
	<a href="{{ route('elegirCampusRegistrar') }}" class="btn btn-primary btn-lg btn-block">Registrase</a>

{{-- 	<a href="" class="btn btn-default btn-lg btn-block">Consultar</a> --}}

</div>

@endsection