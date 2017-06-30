@extends('modulos.plantilla')

@section('title', 'Campus | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
  <h1>Elegir campus</h1>

  <form action="{{ route('datoCampus') }}" method="POST">
    {{ csrf_field() }}
    <select name="campus_id" class="form-control" onchange="this.form.submit()">
      @foreach ($campus as $campu)
      <option value="">Elegir campus</option>
        <option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
      @endforeach
    </select>
  </form>
</div>

@endsection