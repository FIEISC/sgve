@extends('modulos.plantilla')

@section('title', 'Mensajes | SGVE')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Crear Mensaje</h1>

	<div class="panel panel-default">
		<div class="panel-heading">Enviar mensaje</div>
		<div class="panel-body">
		<form action="{{ route('datosMensaje') }}" method="POST">
		{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('rx_user') ? ' has-error' : ''}}">
					<label for="rx_user">Docente</label>
					<select name="rx_user" id="rx_user" class="form-control">
						<option value="">Selecciona un docente</option>
						@foreach ($docentes as $docente)
						<option value="{{ $docente->id }}">{{ $docente->nom_docente }}</option>
						@endforeach
					</select>

					@if ($errors->has('rx_user'))
						<span class="help-block">{{ $errors->first('rx_user') }}</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('mensaje') ? 'has-error' : '' }}">
					<textarea name="mensaje" id="mensaje" cols="30" rows="3" class="form-control"></textarea>
					
					@if ($errors->has('mensaje'))
						<span class="help-block">{{ $errors->first('mensaje') }}</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Enviar</button>
			</div>
		</form>   

	</div>


</div>

</div>

@endsection