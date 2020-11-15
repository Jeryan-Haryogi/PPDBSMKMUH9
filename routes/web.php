<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/Peserta-Didik-Terverifikasi', 'PagesController@data_peserta_didik_baru_terkonfirmasi');
Route::get('/snap', 'SnapController@snap');
Route::get('peserta/snaptoken', 'SnapController@token');
Route::post('peserta/snapfinish', 'SnapController@finish');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@request_login');
Route::get('/kontak-kami', 'KontakKamiController@index');
Route::post('/pesan', 'KontakKamiController@pesan');
Route::get('/daftar-akun', 'DaftarController@index');
Route::post('/daftar-akun', 'DaftarController@request_daftar');
Route::get('/peserta/dashboard', 'PesertaController@index');
Route::get('/peserta/formulir-pendaftaran', 'PesertaController@pendaftaran');
Route::get('/peserta/formulir-pendaftaran/{tokenjurusan}', 'PesertaController@get_token_jurusan');
Route::get('/peserta/formulir-pendaftaran/getkabupaten/{getkabupaten}', 'PesertaController@get_kabupaten_api');
Route::post('/peserta/formulir-pendaftaran', 'PesertaController@kirim_data');
Route::get('/peserta/ceta-formulir-pendaftaran', 'PesertaController@cetak_formulir');
Route::get('/peserta/cetak-formulir-pendaftaran/{id}', 'PesertaController@cetak_formulir_aksi');
Route::get('/peserta/update-formulir-pendaftaran/{id}', 'PesertaController@update_formulir');
Route::patch('/peserta/update-formulir-pendaftaran/{id}', 'PesertaController@update_formulir_request');
Route::get('/peserta/keluar', 'PesertaController@keluar');
Route::get('/Operator/dashboard', 'OperatorController@index');
Route::get('Operator/Peserta-didik-baru', 'OperatorController@peserta_didik_baru_get');
Route::get('/Operator/Keluar', 'OperatorController@keluar_operator');
Route::get('Opertor/Verikasi/{id}', 'OperatorController@verifikasi');
Route::get('Operator/detail-perserta-didik/{id}', 'OperatorController@detail_perserta');
// administrator
Route::get('/Administrator/dashboard', 'AdministratorController@index');
Route::get('Administrator/data-operator', 'AdministratorController@data_operator');
Route::post('Administrator/data-operator', 'AdministratorController@tambah_data_operator');
Route::delete('Administrator/data-operator/{id}', 'AdministratorController@hapus_data_operator');

Route::post('Administrator/update-data-operator', 'AdministratorController@update_data_operator');
Route::get('Administrator/ppdb/peserta-didik-baru/{date}', 'AdministratorController@data_peserta_didik_baru');
Route::delete('Administrator/ppdb/peserta-didik-baru/{date}/{id}', 'AdministratorController@hapus_peserta_didik_baru');
Route::get('Administrator/ppdb/peserta-didik-baru-terkonfirmasi/{date}', 'AdministratorController@data_peserta_didik_baru_terkonfirmasi');
Route::delete('Administrator/ppdb/peserta-didik-baru-terkonfirmasi/{date}/{id}', 'AdministratorController@hapus_peserta_didik_baru_konfirmasi');
Route::get('Administrator/ppdb/export-data-konfirmasi', 'AdministratorController@export_to_excel_konfirmasi');
Route::get('Administrator/Pesan-Masuk', 'AdministratorController@pesan_masuk');
Route::get('Administrator/Setting', 'AdministratorController@view_setting');
Route::post('Administrator/Pesan-Masuk', 'AdministratorController@pesan_masuk_request');
Route::post('Administrator/Ubah-Admin', 'AdministratorController@ubah_admin');
Route::post('Administrator/server-down', function(){
	 Artisan::call('down');
});
Route::post('Administrator/Delete-Database', 'AdministratorController@delete_all_database');
Route::get('Administrator/viewpasan', 'AdministratorController@view_pesan');
Route::get('Administrator/Keluar', 'AdministratorController@admin_keluar');