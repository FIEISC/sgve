@extends('modulos.plantilla')

@section('title', 'Mensajes | SGVE')

@section('contenido')

<div class="col-md-10 col-md-offset-1">
	
	<div class="row">
		<div class="col-md-6">
			<h3>No Leídas</h3>

			@foreach ($noLeidas as $noLeida)
				<li class="list-group-item">
					<a href="{{ $noLeida->data['link'] }}">{{ $noLeida->data['text'] }}</a>

					<form action="{{ route('leidaNotificacion', $noLeida->id) }}" method="POST" class="pull-right"> 

						{!! method_field('PATCH') !!}
						{!! csrf_field() !!}

						<button class="btn btn-danger btn-xs">x</button>
					</form>
				</li>
			@endforeach
		</div>


		<div class="col-md-6">
			<h3>Leídas</h3>
				@foreach ($Leidas as $Leida)
				<li class="list-group-item">
					<a href="{{ $Leida->data['link'] }}">{{ $Leida->data['text'] }}</a>
					<form action="{{ route('borrarNotificacion', $Leida->id) }}" method="POST" class="pull-right"> 

						{!! method_field('DELETE') !!}
						{!! csrf_field() !!}

						<button class="btn btn-danger btn-xs">x</button>
					</form>
				</li>
			@endforeach
		</div>
	</div>
</div>
@endsection