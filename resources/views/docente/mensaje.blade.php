@extends('modulos.plantilla')

@section('title', 'Mensaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="{{ route('notificaciones') }}" class="btn btn-info btn-sm">Atrás</a>
	</div>
</div>
	<h1>Mensaje</h1>

	<p>{{ $mensaje->mensaje }}</p>

	<small>Enviado por {{ $mensaje->sender->nom_docente }}</small>
</div>

@endsection