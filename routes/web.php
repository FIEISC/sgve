<?php
/*Rutas del administrador*/

/*Route::get('/admin/registro', function()
{
	$admin = new sgve\User;
	$admin->nom_docente = 'Naty';
	$admin->no_cuenta = '220494';
	$admin->email = 'naty_snuff@hotmail.com';
	$admin->password = bcrypt('nath123');
	$admin->rol = 0;
	$admin->plantel_id = 1;
	$admin->save();
});
*/


/*Route::get('/admin/registro', function()
{
	$admin = new sgve\User;
	$admin->nom_docente = 'Chuy';
	$admin->no_cuenta = '20131944';
	$admin->email = 'jjaimes@ucol.mx';
	$admin->password = bcrypt('chuy123');
	$admin->rol = 0;
	$admin->plantel_id = 1;
	$admin->save();
});*/


Route::get('/admin/home', 'AdminController@homeAdmin')->name('homeAdmin');

Route::get('/admin/login', 'AdminController@loginAdmin')->name('loginAdmin');

Route::post('/admin/login', 'AdminController@datosLoginAdmin')->name('datosLoginAdmin');

Route::get('/admin/salir', 'AdminController@salirAdmin')->name('salirAdmin');

/*Paginas del administrador */

Route::get('/admin/validar', 'AdminController@validarUsuarios')->name('validarUsuarios');

Route::put('/admin/activar/usuario/{id}', 'AdminController@datoActivarUsuario')->name('datoActivarUsuario');


/*Rutas del sistema*/

Route::get('/campus', 'AuthController@elegirCampus')->name('elegirCampus');

Route::post('/plantel', 'AuthController@datoCampus')->name('datoCampus');

Route::post('/registro', 'AuthController@datoPlantel')->name('datoPlantel');

Route::post('/registro/datos', 'AuthController@datosRegistro')->name('datosRegistro');

Route::get('/', 'AuthController@login')->name('login');

Route::post('/login/datos', 'AuthController@datosLogin')->name('datosLogin');

Route::get('/home', 'AuthController@home')->name('home');

Route::get('/salir', 'AuthController@salir')->name('salir');

/*Rutas del Coordinador*/

Route::get('/coordinador/validar_usuarios', 'CoordinadorController@validarUsuarios')->name('validarUsuarios');
