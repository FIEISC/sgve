@extends('modulos.plantilla')

@section('title', 'Registro | SGVE')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1 class="text-center">Registro Alumno</h1>

<form action="{{ route('datosRegistroAlumno') }}" method="POST">

	{!! csrf_field() !!}

	<div class="form-group{{ $errors->has('nom_alumno') ? ' has-error' : '' }}">
		<label for="nom_alumno">Nombre completo</label>
		<input type="text" name="nom_alumno" class="form-control">

		@if ($errors->has('nom_alumno'))
			<span class="help-block">{{ $errors->first('nom_alumno') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('no_cuenta') ? ' has-error' : '' }}">
		<label for="no_cuenta">Número de cuenta</label>
		<input type="text" name="no_cuenta" class="form-control">

		@if ($errors->has('no_cuenta'))
			<span class="help-block">{{ $errors->first('no_cuenta') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('nom_padre') ? ' has-error' : '' }}">
		<label for="nom_padre">Nombre del padre o tutor</label>
		<input type="text" name="nom_padre" class="form-control">

		@if ($errors->has('nom_padre'))
			<span class="help-block">{{ $errors->first('nom_padre') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('tel_padre') ? ' has-error' : '' }}">
		<label for="tel_padre">Teléfono del padre o tutor</label>
		<input type="text" name="tel_padre" class="form-control">

		@if ($errors->has('tel_padre'))
			<span class="help-block">{{ $errors->first('tel_padre') }}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('no_imss') ? ' has-error' : '' }}">
		<label for="no_imss">Número de IMSS</label>
		<input type="text" name="no_imss" class="form-control">

		@if ($errors->has('no_imss'))
			<span class="help-block">{{ $errors->first('no_imss') }}</span>
		@endif
	</div>

	<input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

	<div class="form-group">
		<select name="carrera_id" class="form-control">
			<option value="">Elegir carrera</option>
			@foreach ($carreras as $carrera)
			   <option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
			@endforeach
		</select>
	</div>

	@if ($ciclo->ciclo === 1)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="3">3</option>
				<option value="5">5</option>
			</select>
		</div>
	@elseif($ciclo->ciclo === 2)
		<div class="form-group">
			<select name="semestre" class="form-control">
				<option value="4">4</option>
				<option value="6">6</option>
			</select>
		</div>
	@endif
    
    <input type="hidden" name="aceptado" value="1">

	<div class="col-xs-12" style="margin: 4px;">
		<b><a href="#" data-toggle="modal" data-target="#myModal">Leer Reglamento de Viajes</a></b>
	</div>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	      {{--   <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
	        <h4 class="modal-title">Reglamento</h4>
	      </div>
	      <div class="modal-body">
	        <p>Por medio de la presente acepto que la <b>UNIVERSIDAD DE COLIMA y la FACULTAD DE INGENIERÍA ELECTROMECÁNICA</b>, su personal directivo, administrativo y docente, no son responsables de mi persona, ni de mis actos al asistir a los viajes que se lleven a cabo durante mi estancia como estudiante de la Facultad. 
	        Así mismo, informo a que dispongo de servicio médico del cual adjunto información.
	        Acepto la responsabilidad del cuidado de mi persona así como de mis actos y me comprometo a comportarme según los lineamientos de la Universidad de Colima y del reglamento para viajes de estudios para no dañar su imagen. Acepto que la Universidad de Colima no es responsable por cualquier accidente que pudiera suceder durante el viaje.
	        </p>
	        <p>Recuerda que cuando participas en un viaje de estudio además de representarte a ti, representas
	        a tu familia y a la Universidad de Colima, por lo que deberás comportarte con rectitud y respeto en
	        los recintos académicos y culturales que visites, así como en los complejos empresariales que te
	        abran las puertas para que enriquezcas tu formación académica y portar el uniforme de la
	        Facultad en cada recorrido o visita. En cada viaje serás evaluado con un trabajo de análisis o un
	        reporte académico (el profesor te indicará la forma y los puntos de valor en la calificación que se
	        te asignará). Está de más decirte que si no cumples con las disposiciones que te indique el profesor
	        en el cumplimiento del Reglamento de viajes de estudio, te harás acreedor a sanciones
	        académicas.
	        </p>
	        <p>
	          Recuerda que el profesor es tu guía, quien con apoyo de algunos de tus compañeros o contigo
	          mismo, llevará el control de sus grupos de trabajo antes, durante y después de los recorridos:
	          además, entregará un reporte final de la visita o el viaje a la dirección de la escuela y a el
	          encargado de vinculación, que incluya: lista de contactos con las empresas y sitios visitados (razón
	          social de la empresa, dirección de las oficinas y de la planta industrial en caso de ser distintas,
	          nombre del contacto, teléfono y extensión, correo electrónico) Itinerario realizado, en caso de no
	          haber realizado alguna visita programada expresar los motivos, reporte de las visitas con
	          fotografías del grupo en las instalaciones de las empresas con presencia de la marca o logotipo de
	          la empresa, cualquier incidencia ocurrida en el viaje, conclusiones.</p>
	          <p>Las actitudes y comportamiento que estarán sujetos a sanción, y que a la vez ocasionarán la no
	          participación en una próxima salida son:</p>
	        </p>
	        <p>
	          <ol>
	            <li>Conducta negativa a juicio consensado de los profesores y jefes de grupo.</li>
	            <li>Impuntualidad en el cumplimiento de las actividades del programa.</li>
	            <li>Consumo de bebidas embriagantes o drogas durante cualquier etapa del viaje.</li>
	            <li>Uso indiscriminado de aparatos electrónicos (celulares, ipod, videojuegos, cámaras fotográficas, entre otros).</li>
	            <li>Destrozos en el transporte, hospedaje, o lugar de visita (el daño será cubierto por el o los estudiantes involucrados).</li>
	            <li>Conductas que pongan en riesgo la seguridad e integridad individual o del grupo.</li>
	            <li>No entregar reporte o trabajo del viaje de estudio.</li>
	            <li>No cumplir con los compromisos del viaje.</li>  
	          </ol>
	        </p>
	        <p>Los casos que ameriten sanciones mayores serán resueltos por el Consejo Técnico del plantel</p>
	      </div>
	      <div class="modal-footer">

	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	       
	      </div>
	    </div>

	  </div>
	  </div>


<p><b>Nota: Al registrarte aceptas los términos que se establecen en el reglamento de viajes estudiantiles</b></p>


	<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
</div>

@endsection