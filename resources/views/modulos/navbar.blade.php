<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     {{--  <a class="navbar-brand" href="#">Brand</a> --}}
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @if (Auth::check())
       <ul class="nav navbar-nav">

         @if (Auth::user()->hasRoles(['1']))
         <li><a href="{{ route('verViajesDirector') }}">Ver viajes</a></li>

         @elseif (Auth::user()->hasRoles(['2']))
         <li><a href="{{ route('validarUsuarios') }}">Válidar Usuarios</a></li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Viajes <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="{{ route('verViajes') }}">Ver viajes</a></li>
           <li><a href="{{ route('darBajaViajes') }}">Dar de baja</a></li>
          </ul>
        </li>

         @elseif(Auth::user()->hasRoles(['3']))
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Viajes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('elegirCiclo') }}">Crear Viaje</a></li>
            <li><a href="{{ route('listaViajes') }}">Lista de Viajes</a></li>
            <li><a href="{{ route('listaReporteViaje') }}">Reporte del Viaje</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('crearEmpresas') }}">Crear Empresas</a></li>
            <li><a href="{{ route('asignarEmpresasViaje') }}">Asignar Empresas</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grupos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('crearGrupos') }}">Crear Grupos</a></li>
            <li><a href="{{ route('asignarAlumnosGrupos') }}">Asignar Alumnos-Grupos</a></li>
          </ul>
        </li>

         <li><a href="{{ route('viajesAsignados') }}">Viajes asignados</a></li>
         @endif
      
      </ul>

       <ul class="nav navbar-nav navbar-right">
       <li><a href="">{{ Auth::user()->nom_docente }}</a></li>
        <li><a href="{{ route('salir') }}">Salir</a></li>
      </ul>
    @endif
      
    @if (Auth::guest())
    <ul class="nav navbar-nav navbar-left">
      <li><a href="{{ route('elegirOpciones') }}">Alumno</a></li>
    </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('elegirCampus') }}">Registro</a></li>
      </ul>
    @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

