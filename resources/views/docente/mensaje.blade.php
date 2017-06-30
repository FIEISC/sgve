@extends('modulos.plantilla')

@section('title', 'Mensaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="row">
	<div class="col-md-2 col-md-offset-10">
		<a href="{{ route('notificaciones') }}" class="btn btn-info btn-sm">Atrás</a>
	</div>
</div>
<br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Mensaje</h3>
  </div>
  <div class="panel-body">
    
	<p>{{ $mensaje->mensaje }}</p>

	<small><b>Enviado por:</b> {{ $mensaje->sender->nom_docente }}</small>
  </div>
</div>

</div>

@endsection