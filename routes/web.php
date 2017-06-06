<?php

Route::get('/', 'AuthController@login')->name('login');

Route::get('/registro', 'AuthController@registro')->name('registro');
