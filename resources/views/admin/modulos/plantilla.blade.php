<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'SGVE')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<link rel="icon" href="http://siceuc.ucol.mx/pp/" type="image/x-icon">
	<link rel="shortcut icon" href="http://siceuc.ucol.mx/pp/application/assets/images/logos/logocircular.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="{{ asset('plantilla/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/estilos/jquery.noty.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/nobootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/base.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">

	<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}">

	{{--   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
	<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker3-standalone.css') }}">
	<script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>

</head>
<body>

	<header>
		<img src="{{ asset('/estilos/logocircularwhite.png') }}" alt="" width="75px">
		<h3 class="titulo">Gestión de Viajes Estudiantiles</h3>        
		<h4 class="subtitulo">Facultad de Ingeniería Electromecánica</h4>
	</header>
	
@include('admin.modulos.navbar')
	<div class="container">
		@yield('contenido')
	</div>

	<footer class="footer-distributed">
		<div class="footer-left">
			<p class="footer-links">
				<a href="#">Link1</a> - <a href="#">Link2</a> - <a href="#">Link3</a>
			</p>
			<p>SIGESPI 2017 | Developed by Naty and Chuys :v <span class="glyphicon glyphicon-heart-empty"></span></p>
		</div>
	</footer>

<script src="/sweetalert/sweetalert.min.js"></script>
@include('sweet::alert')

</body>
</html>