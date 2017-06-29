@extends('modulos.plantilla')

@section('title', 'Reporte Viaje | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
  <h1 class="text-center">Reporte del viaje</h1>
 
 @if (count($viajes) === 0)
    <h3 class="text-center text-danger">Viajes no encontrados, solo se mostrarán los viajes que hallan sido aceptados por el coordinador de vinculación y el director del plantel.</h3>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    @else
     <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>Viaje</th>
        <th>Acción</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($viajes as $viaje)
        <tr>
          <td>{{ $viaje->nom_viaje }}</td>
          <td>

            @if ($viaje->reporte != null)
            <a href="{{ route('editarReporteViajeForm', $viaje->id) }}" class="btn btn-warning btn-sm">Editar reporte</a>

            <a href="{{ route('verReporteViaje', $viaje->id) }}" class="btn btn-info btn-sm">Ver reporte</a>

            @else

            <a href="{{ route('reporteViajeForm', $viaje->id) }}" class="btn btn-primary btn-sm">Crear reporte</a>

            <a href="{{ route('editarReporteViajeForm', $viaje->id) }}" class="btn btn-warning btn-sm">Editar reporte</a>

            <a href="{{ route('verReporteViaje', $viaje->id) }}" class="btn btn-info btn-sm">Ver reporte</a>
            @endif
       
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
 @endif
</div>

@endsection