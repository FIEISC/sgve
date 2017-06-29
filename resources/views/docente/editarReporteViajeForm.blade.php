@extends('modulos.plantilla')

@section('title', 'Editar reporte Viaje | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<div class="row">
  <div class="col-md-2 col-md-offset-10">
    <a href="{{ route('listaReporteViaje') }}" class="btn btn-info btn-sm">Atrás</a>
  </div>
</div>
  <h1 class="text-center">Editar reporte del viaje</h1>
  
  @php
    $hoy = date('20y-m-d');

    $fecha = '2017-07-01';
  @endphp
  @if ($fecha > $viaje->fec_fin)

    <form action="{{ route('datoEditarReporteViaje', $viaje->id) }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    <div class="form-group">
      <label for="reporte">Reporte del viaje</label>
      <textarea name="reporte" id="reporte" cols="30" rows="3" class="form-control">{{ $viaje->reporte }}</textarea>
    </div>


    <div class="form-group">
      <label for="imagen1">Imagen 1</label>
      <br>
      <img style="width: 200px;" src="{{ Storage::url($viaje->imagen1) }}" alt="">
      <br>
      <input type="file" name="imagen1">
    </div>

    <div class="form-group">
      <label for="imagen2">Imagen 2</label>
      <br>
      <img style="width: 200px;" src="{{ Storage::url($viaje->imagen2) }}" alt="">
      <br>
      <input type="file" name="imagen2">
    </div>

    <div class="form-group">
      <label for="imagen3">Imagen 3</label>
      <br>
      <img style="width: 200px;" src="{{ Storage::url($viaje->imagen3) }}" alt="">
      <br>
      <input type="file" name="imagen3">
    </div>

    <div class="form-group">
      <label for="imagen4">Imagen 4</label>
      <br>
      <img style="width: 200px;" src="{{ Storage::url($viaje->imagen4) }}" alt="">
      <br>
      <input type="file" name="imagen4">
    </div>

    <div class="form-group">
      <label for="imagen5">Imagen 5</label>
      <br>
      <img style="width: 200px;" src="{{ Storage::url($viaje->imagen5) }}" alt="">
      <br>
      <input type="file" name="imagen5">
    </div>


      <button type="submit" class="btn btn-primary btn-block">Crear reporte</button>
  </form>

  @else
  <h3 class="text-center text-danger">Todavía no puede crear el reporte del viaje, intentelo cuando el viaje halla finalizado</h3>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  @endif
</div>

@endsection