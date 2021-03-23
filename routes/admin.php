<?php

Route::get('/', 'Admin\HomeController@index')->name('admin.home');
Route::get('/login', 'Admin\LoginController@form');
Route::post('/login', 'Admin\LoginController@login')->name('admin.login');
Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('/profil', 'Admin\AdminController@profil')->name('admin.profil');
Route::put('/profil/update', 'Admin\AdminController@profilupdate')->name('admin.profil.update');
Route::put('/profil/password', 'Admin\AdminController@profilupdatepasword')->name('admin.profil.password');

// Route::get('/has', 'Admin\AdminController@has');

// Route::get('/gunung', 'Admin\GunungController@index')->name('admin.gunung');
// Route::get('/gunung/publish', 'Admin\GunungController@publish')->name('admin.gunung.publish');
// Route::get('/gunung/tambah', 'Admin\GunungController@create')->name('admin.gunung.create');
// Route::get('/gunung/show/{id}', 'Admin\GunungController@show')->name('admin.gunung.show');
// Route::post('/gunung/tambah', 'Admin\GunungController@store')->name('admin.gunung.store');
// Route::get('/gunung/edit/{id}', 'Admin\GunungController@edit')->name('admin.gunung.edit');
// Route::put('/gunung/update', 'Admin\GunungController@update')->name('admin.gunung.update');
// Route::delete('/gunung/delete/{id}', 'Admin\GunungController@delete')->name('admin.gunung.delete');

Route::get('/berita', 'Admin\BeritaController@index')->name('admin.berita');
Route::get('/berita/publish', 'Admin\BeritaController@publish')->name('admin.berita.publish');
Route::get('/berita/verifikasi', 'Admin\BeritaController@verifikasi')->name('admin.berita.verifikasi');
Route::get('/berita/tambah', 'Admin\BeritaController@create')->name('admin.berita.create');
Route::get('/berita/show/{id}', 'Admin\BeritaController@show')->name('admin.berita.show');
Route::post('/berita/tambah', 'Admin\BeritaController@store')->name('admin.berita.store');
Route::get('/berita/edit/{id}', 'Admin\BeritaController@edit')->name('admin.berita.edit');
Route::put('/berita/update', 'Admin\BeritaController@update')->name('admin.berita.update');
Route::delete('/berita/delete/{id}', 'Admin\BeritaController@delete')->name('admin.berita.delete');

Route::get('/literasi', 'Admin\LiterasiController@index')->name('admin.literasi');
Route::get('/literasi/publish', 'Admin\LiterasiController@publish')->name('admin.literasi.publish');
Route::get('/literasi/verifikasi', 'Admin\LiterasiController@verifikasi')->name('admin.literasi.verifikasi');
Route::get('/literasi/tambah', 'Admin\LiterasiController@create')->name('admin.literasi.create');
Route::get('/literasi/show/{id}', 'Admin\LiterasiController@show')->name('admin.literasi.show');
Route::post('/literasi/tambah', 'Admin\LiterasiController@store')->name('admin.literasi.store');
Route::get('/literasi/edit/{id}', 'Admin\LiterasiController@edit')->name('admin.literasi.edit');
Route::put('/literasi/update', 'Admin\LiterasiController@update')->name('admin.literasi.update');
Route::delete('/literasi/delete/{id}', 'Admin\LiterasiController@delete')->name('admin.literasi.delete');

Route::get('/reporter', 'Admin\ReporterController@index')->name('admin.reporter');
Route::get('/reporter/status', 'Admin\ReporterController@status')->name('admin.reporter.status');
Route::get('/reporter/tambah', 'Admin\ReporterController@create')->name('admin.reporter.create');
Route::get('/reporter/show/{id}', 'Admin\ReporterController@show')->name('admin.reporter.show');
Route::post('/reporter/tambah', 'Admin\ReporterController@store')->name('admin.reporter.store');
Route::get('/reporter/edit/{id}', 'Admin\ReporterController@edit')->name('admin.reporter.edit');
Route::put('/reporter/update', 'Admin\ReporterController@update')->name('admin.reporter.update');
Route::delete('/reporter/delete/{id}', 'Admin\ReporterController@delete')->name('admin.reporter.delete');

Route::get('/video', 'Admin\VideoController@index')->name('admin.video');
Route::get('/video/publish', 'Admin\VideoController@publish')->name('admin.video.publish');
Route::get('/video/verifikasi', 'Admin\VideoController@verifikasi')->name('admin.video.verifikasi');
Route::get('/video/tambah', 'Admin\VideoController@create')->name('admin.video.create');
Route::get('/video/show/{id}', 'Admin\VideoController@show')->name('admin.video.show');
Route::post('/video/tambah', 'Admin\VideoController@store')->name('admin.video.store');
Route::get('/video/edit/{id}', 'Admin\VideoController@edit')->name('admin.video.edit');
Route::put('/video/update', 'Admin\VideoController@update')->name('admin.video.update');
Route::delete('/video/delete/{id}', 'Admin\VideoController@delete')->name('admin.video.delete');

Route::get('/atribut', 'Admin\AtributController@index')->name('admin.atribut');
Route::get('/atribut/tambah', 'Admin\AtributController@create')->name('admin.atribut.create');
Route::get('/atribut/show/{id}', 'Admin\AtributController@show')->name('admin.atribut.show');
Route::post('/atribut/tambah', 'Admin\AtributController@store')->name('admin.atribut.store');
Route::get('/atribut/edit/{id}', 'Admin\AtributController@edit')->name('admin.atribut.edit');
Route::put('/atribut/update', 'Admin\AtributController@update')->name('admin.atribut.update');
Route::delete('/atribut/delete/{id}', 'Admin\AtributController@delete')->name('admin.atribut.delete');

Route::get('/album', 'Admin\AlbumController@index')->name('admin.album');
Route::get('/album/tambah', 'Admin\AlbumController@create')->name('admin.album.create');
Route::get('/album/show/{id}', 'Admin\AlbumController@show')->name('admin.album.show');
Route::get('/album/publish', 'Admin\AlbumController@publish')->name('admin.album.publish');
Route::get('/album/verifikasi', 'Admin\AlbumController@verifikasi')->name('admin.album.verifikasi');
Route::post('/album/tambah', 'Admin\AlbumController@store')->name('admin.album.store');
Route::get('/album/edit/{id}', 'Admin\AlbumController@edit')->name('admin.album.edit');
Route::put('/album/update', 'Admin\AlbumController@update')->name('admin.album.update');
Route::delete('/album/delete/{id}', 'Admin\AlbumController@delete')->name('admin.album.delete');

Route::get('/foto', 'Admin\FotoController@index')->name('admin.foto');
Route::get('/foto/tambah/{album_id}', 'Admin\FotoController@create')->name('admin.foto.create');
Route::post('/foto/tambah', 'Admin\FotoController@store')->name('admin.foto.store');
Route::get('/foto/edit/{id}', 'Admin\FotoController@edit')->name('admin.foto.edit');
Route::put('/foto/update', 'Admin\FotoController@update')->name('admin.foto.update');
Route::delete('/foto/delete/{id}', 'Admin\FotoController@delete')->name('admin.foto.delete');

Route::get('/iklan', 'Admin\IklanController@index')->name('admin.iklan');
Route::get('/iklan/tambah', 'Admin\IklanController@create')->name('admin.iklan.create');
Route::post('/iklan/tambah', 'Admin\IklanController@store')->name('admin.iklan.store');
Route::get('/iklan/edit/{id}', 'Admin\IklanController@edit')->name('admin.iklan.edit');
Route::put('/iklan/update', 'Admin\IklanController@update')->name('admin.iklan.update');
Route::delete('/iklan/delete/{id}', 'Admin\IklanController@delete')->name('admin.iklan.delete');
