<?php
/*Rutas del administrador*/

Route::get('/admin/login', 'AdminController@loginAdmin')->name('loginAdmin');
/*Rutas del sistema*/
Route::get('/', 'AuthController@login')->name('login');

Route::get('/registro', 'AuthController@registro')->name('registro');
