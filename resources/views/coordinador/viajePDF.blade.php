<h3>Nombre del viaje</h3>
    <p>{{ $viaje->nom_viaje }}</p>

    <h3>Motivos del viaje</h3>
    <p>{{ $viaje->motivos }}</p>

    <h3>Impacto del viaje en los alumnos</h3>
    <p>{{ $viaje->impacto }}</p>

    <h3>Fecha de salida</h3>
    <p>{{ $viaje->fec_ini }}</p>

    <h3>Fecha de regreso</h3>
    <p>{{ $viaje->fec_fin }}</p>

    <h3>Docente creador del viaje</h3>
    <p>{{ $viaje->user->nom_docente }}</p>

    <h3>Docente acompañante</h3>
    <p>{{ $viaje->compa }}</p>

    <h3>Carrera</h3>
    <p>{{ $viaje->carrera->nom_carrera }}</p>

    <h3>Grupos que asistieron</h3>
    @foreach ($viaje->grupos as $grupo)
				<ul>
					<li style="list-style: none;">{{ $grupo->nom_grupo }}</li>
				</ul>
	@endforeach

	<h3>Empresas visitadas</h3>
	@foreach ($viaje->manyEmpresas as $empresa)
			<ul>
				<li style="list-style: none;">{{ $empresa->nom_empresa }}</li>
			</ul>
	@endforeach

	<h3>Reporte final del viaje</h3>
	<p>{{ $viaje->reporte }}</p>

	<h3>Evidencias</h3>

	<img style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen1) }}" alt="">
  {{--  <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen2) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen3) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen4) }}" alt="">
   <img class="img-rounded img-responsive" style="width: 500px; height: 300px; padding: 10px; margin: auto;" src="{{ Storage::url($viaje->imagen5) }}" alt=""> --}}
