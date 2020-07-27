<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('admin');

Route::resource('pasien', 'pasienController');

Route::resource('Poli', 'PoliController');
Route::get('poli/data', 'DataController@poli')->name('poli.data');

Route::resource('Dokter', 'DokterController');
Route::resource('kartuBerobat', 'kartuBerobatController');
Route::resource('smsMasuk', 'SmsMasukController');

Route::resource('antrian', 'antrianController');
