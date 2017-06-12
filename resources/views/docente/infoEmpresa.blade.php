@extends('modulos.plantilla')

@section('title', 'Empresa información | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="col-md-2 col-md-offset-9">
	<a href="{{ route('listaEmpresas') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>   Regresar</a>
</div>
<br>
<br>	
	<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">{{ $empresa->nom_empresa }}</h3>
		</div>
		<div class="panel-body">
			<h3>Dirección</h3>
			<p>{{ $empresa->direccion }}</p>

			<h3>Teléfono</h3>
			<p>{{ $empresa->telefono }}</p>

			<h3>Correo electrénico</h3>
			<p>{{ $empresa->correo }}</p>

			<h3>Contacto (RH)</h3>
			<p>{{ $empresa->contacto }}</p>

		</div>
	</div>
</div>

@endsection