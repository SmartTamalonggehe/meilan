<?php 

Route::get('/', 'DashboardController@index')->name('dokter');

Route::get('/noUrut', 'DashboardController@showNoUrut')->name('showNoUrut');

Route::get('/sebelumnya', 'DashboardController@sebelumnya')->name('sebelumnya');
Route::get('/selanjutnya', 'DashboardController@selanjutnya')->name('selanjutnya');

Route::resource('pasienDokter', 'PasienController');
