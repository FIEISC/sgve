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

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    {{-- DatePicker --}}
    <link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker3.standalone.css') }}">
    <script src="{{ asset('datePicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('datePicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}">

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
		<p class="footer-links">
			<a href="#">Link1</a> - <a href="#">Link2</a> - <a href="#">Link3</a>
		</p>
		<p>SIGESPI 2017 | Developed by Naty and Chuys :v <span class="glyphicon glyphicon-heart-empty"></span></p>
	</div>
</footer>

{{-- <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}

<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
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