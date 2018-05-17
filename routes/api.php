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
});