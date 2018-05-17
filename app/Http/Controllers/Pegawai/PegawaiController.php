<?php

namespace App\Http\Controllers\Pegawai;

use App\Model\Master\SatuanKerja;
use App\Model\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class PegawaiController extends Controller
{
    public function profil() {
        $user =  JWTAuth::parseToken()->toUser();

        $pegawai = Pegawai::where('nip', $user->username)->first();

        if($pegawai) {
            return $this->dataMessage((object) [
                'nip' => $pegawai->nip,
                'level' => $user->level,
                'nama' => $pegawai->nama,
            ], false, 'Sukses Mendapatkan Profil');
        }

        $satker = SatuanKerja::where('kode', $user->username)->first();

        if($satker) {
            return $this->dataMessage((object) [
                'kode_satker' => $satker->kode,
                'level' => $user->level,
                'nama' => $satker->nama,
            ], false, 'Sukses Mendapatkan Profil');
        }

        return $this->dataMessage((object) [
            'username' => $user->username,
            'level' => $user->level,
        ], false, 'Sukses Mendapatkan Profil');
    }
}
