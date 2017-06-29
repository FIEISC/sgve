@extends('modulos.plantilla')

@section('title', 'Reporte Viaje | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">

<div class="row">
  <div class="col-md-2 col-md-offset-10">
    <a href="{{ route('listaReporteViaje') }}" class="btn btn-info btn-sm">Atrás</a>
  </div>
</div>
<br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Reporte del viaje</h3>
  </div>
  <div class="panel-body">
   <h3 class="text-center">Reporte</h3>
   <p class="text-center">{{ $viaje->reporte }}</p>

   <h3 class="text-center">Evidencias</h3>

   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen1) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen2) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen3) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen4) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen5) }}" alt="">
  </div>
</div>
</div>

@endsection