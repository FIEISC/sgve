@extends('modulos.plantilla')

@section('title', 'Editar Empresas | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1>Asignar empresas</h1>

<p>{{ $viaje->nom_viaje }}</p>

{!! Form::model($viaje, ['route' => ['datosEditarEmpresasViaje', $viaje->id], 'method' => 'PUT']) !!}

  <div>
    {!! Form::label('empresas', 'Empresas:') !!}
    <br>
    {!! Form::select('empresas[]', $empresas, null, ['multiple', 'class' => 'form-control']) !!}
  </div>

    {!! Form::submit('Asignar',['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!}

</div>
@endsection