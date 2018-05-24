<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/', 'Controller@index');
Route::post('/authentication', 'AuthController@verifyCredentials');
Route::get('/profil', 'Pegawai\PegawaiController@profil');

Route::prefix('/master')->group(function() {
   Route::apiResource('/jabatan', 'Master\JabatanController');
   Route::apiResource('/agama', 'Master\AgamaController');
   Route::apiResource('/klasifikasi-surat', 'Master\KlasifikasiSuratController');
   Route::apiResource('/golongan', 'Master\GolonganController');
   Route::apiResource('/eselon', 'Master\EselonController');
   Route::apiResource('/golongan-darah', 'Master\GolonganDarahController');
   Route::apiResource('/jenis-instansi', 'Master\JenisInstansiController');
   Route::apiResource('/keamanan-surat', 'Master\KeamananSuratController');
   Route::apiResource('/kecamatan', 'Master\KecamatanController');
   Route::apiResource('/klasifikasi-surat', 'Master\KlasifikasiSuratController');
   Route::apiResource('/satuan-kerja', 'Master\SatuanKerjaController');
   Route::apiResource('/status-kepegawaian', 'Master\StatusKepegawaian');
});

Route::apiResource('/surat-masuk-manual', 'SuratMasuk\SuratMasukManualController');
Route::apiResource('/penerima-surat', 'SuratMasuk\SuratMasukManualController');
Route::apiResource('/instansi', 'InstansiController');