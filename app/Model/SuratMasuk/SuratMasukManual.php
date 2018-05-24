<?php

namespace App\Model\SuratMasuk;

use App\Model\Instansi;
use App\Model\Master\Jabatan;
use App\Model\Master\JenisInstansi;
use App\Model\Master\KlasifikasiSurat;
use App\Model\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class SuratMasukManual extends Model
{
//    use SoftDeletes;

    protected $table = 'surat_masuk_manual';

    public function pembuatSurat() 
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function instansiPengirim()
    {
        return $this->hasOne(Instansi::class, 'id', 'instansi_pengirim_id');
    }

    public function jabatanPengirim()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan_pengirim_id');
    }

    public function jenisInstansi()
    {
        return $this->hasOne(JenisInstansi::class, 'id', 'jenis_instansi_id');
    }

    public function klasifikasiSurat() {
        return $this->hasOne(KlasifikasiSurat::class, 'id', 'klasifikasi_id');
    }

    public function penerimaSurat() {
        return $this->hasOne(Pegawai::class, 'id', 'penerima_surat_id');
    }

    public function tembusanSurat() {
        return $this->hasOne(Pegawai::class, 'id', 'tembusan_surat_id');
    }
}
