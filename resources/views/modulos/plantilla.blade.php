<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'SGVE')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<link rel="icon" href="http://siceuc.ucol.mx/pp/" type="image/x-icon">
	<link rel="shortcut icon" href="http://siceuc.ucol.mx/pp/application/assets/images/logos/logocircular.ico" type="image/x-icon">

	<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    
	<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/estilos/jquery.noty.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/nobootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/estilos/base.css') }}" media="screen">

<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>

</head>
<body>

	<header>
		<img src="{{ asset('/estilos/logocircularwhite.png') }}" alt="" width="75px">
		<h3 class="titulo">Gestión de Viajes Estudiantiles</h3>        
		<h4 class="subtitulo">Facultad de Ingeniería Electromecánica</h4>
	</header>

@include('modulos.navbar')
<div class="container">
	@yield('contenido')
</div>

 <footer class="footer-distributed">
	<div class="footer-left">
	<p>SIGESPI 2017 | Desarrollado por Alumnos de ISC</p>
		<p class="footer-links">
			<ul>
				<li><a href="#"><span class="glyphicon glyphicon-flag"></span> Facultad de Ingeniería Electromecánica</a></li>
				<li><a href="http://portal.ucol.mx/fie/"><span class="glyphicon glyphicon-map-marker"></span> Dirección: Km 20, carretera Manzanillo-Cihuatlan Ejido El Naranjo Manzanillo, Colima</a></li>				
			</ul>
		</p>
		
	</div>
</footer>

<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>


    {{-- DatePicker --}}
    <link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker3.standalone.css') }}">
    <script src="{{ asset('datePicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('datePicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}">

	<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
</script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}


<script>
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
</script>



<script>
	$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

<script src="/sweetalert/sweetalert.min.js"></script>
@include('sweet::alert')
	
</body>
</html>