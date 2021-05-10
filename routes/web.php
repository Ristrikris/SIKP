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

Route::get('/', 'HomeController@log');

Auth::routes();

Route::get('/home_koor', 'HomeController@index_koor')->name('home_koor');
Route::get('/sikp/koor_bimbingan_kp', 'KoorController@getBimbinganKpKoor');
Route::get('/sikp/{idKp}/{nim}/koorSetUjian', 'KoorController@pengajuanUjian');
Route::get('/sikp/koor_ujian_kp', 'KoorController@getUjianKoor');
Route::get('/sikp/regis_kp', 'KoorController@getRegisKp');
Route::post('/sikp/setKp', 'KoorController@setKp');
Route::get('/sikp/openkp/{nim}', 'KoorController@fileKp');
Route::get('/sikp/regis_pra_kp', 'KoorController@getRegisPraKpKoor');
Route::post('/sikp/setPraKp', 'KoorController@setPraKp');
Route::get('/sikp/openprakp/{nim}', 'KoorController@filePraKp');
Route::get('/sikp/surat_ket', 'KoorController@getSuratKeteranganKoor');
Route::post('/sikp/setSurat', 'KoorController@setSurat');
Route::get('/sikp/opensurat/{nim}', 'KoorController@fileSurat');
Route::get('/sikp/set_ujian', 'KoorController@getSetUjianKoor');
Route::post('/sikp/setUjian', 'KoorController@setUjian');
Route::get('/sikp/batas_kp', 'KoorController@getBatasKpKoor');
Route::post('/sikp/setBatas', 'KoorController@setBatas');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home_mahasiswa', 'HomeController@setNim');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

Route::get('/sikp/jadwalUjian', 'MahasiswaController@getJadwal');
Route::get('/sikp/suratKet', 'MahasiswaController@getSurat');
Route::post('/mhs/insertSuratKet', 'MahasiswaController@tambahSurat');
Route::get('/sikp/pengajuanKp', 'MahasiswaController@getPengajuanKp');
Route::post('/sikp/insertPengajuanKp', 'MahasiswaController@tambahPengajuanKp');
Route::get('/sikp/pengajuanPraKp', 'MahasiswaController@getPengajuanPraKp');
Route::post('/mhs/insertPraKp', 'MahasiswaController@tambahPengajuanPraKp');

Route::get('/home_dosen', 'HomeController@index_dosen')->name('home_dosen');
Route::get('/sikp/bimbingan_kp', 'DosenController@getBimbinganKp');
Route::get('/sikp/{idKp}/{nim}/setUjian', 'DosenController@setUjian');
Route::get('/sikp/ujian_kp', 'DosenController@getDataUjianKp');


