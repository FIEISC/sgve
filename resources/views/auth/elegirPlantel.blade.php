@extends('modulos.plantilla')

@section('title', 'Planteles | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
  <h1>Elegir plantel</h1>

  <form action="{{ route('datoPlantel') }}" method="POST">
    {{ csrf_field() }}
    <select name="plantel_id" class="form-control" onchange="this.form.submit()">
      @foreach ($planteles as $plantel)
      <option value="">Elegir campus</option>
        <option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
      @endforeach
    </select>
  </form>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
@endsection