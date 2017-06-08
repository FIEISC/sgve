@extends('admin.modulos.plantilla')

@section('title', 'Crear Ciclos | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1 class="text-center">Crear ciclo escolar</h1>

	<form action="" method="POST">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nom_ciclo">Nombre del ciclo</label>
			<input type="text" name="nom_ciclo" class="form-control">
		</div>

		<div class="form-group">
			<label for="ciclo">Nombre del ciclo</label>
			<select name="ciclo" id="ciclo" class="form-control">
				<option value="1">AGO-DIC</option>
				<option value="2">ENE-JUL</option>
			</select>
		</div>

		<div class="form-group">
			<label for="date">Fecha</label>
			<div class="input-group">
				<input type="text" class="form-control datepicker" name="date">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</div>
			</div>
		</div>


	</form>
</div>

@endsection