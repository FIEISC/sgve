@extends('modulos.plantilla')

@section('title', 'Editar Empresas | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

 <div class="row">
   	<div class="col-md-2 col-md-offset-10">
   		<a href="{{ route('asignarEmpresasViaje') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>  Atrás</a>
   	</div>
   </div>

	<h1 class="text-center">Asignar empresas</h1>

<p>{{ $viaje->nom_viaje }}</p>

{!! Form::model($viaje, ['route' => ['datosEditarEmpresasViaje', $viaje->id], 'method' => 'PUT']) !!}

  <div>
    {!! Form::label('empresas', 'Empresas:') !!}
    <br>
    {!! Form::select('empresas[]', $empresas, null, ['multiple', 'class' => 'form-control']) !!}
  </div>

<br>
    {!! Form::submit('Asignar',['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!}

</div>
@endsection