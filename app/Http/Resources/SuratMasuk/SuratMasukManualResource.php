<?php

namespace App\Http\Resources\SuratMasuk;

use Illuminate\Http\Resources\Json\JsonResource;

class SuratMasukManualResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pengirim' => [
                'instansi' => $this->instansiPengirim,
                'jabatan' => $this->jabatanPengirim,
                'jenis' => $this->jenisInstansi,
                'alamat' => $this->alamat_pengirim,
            ],
            'klasifikasi' => $this->klasifikasi,
            'keamanan_surat' => $this->keamananSurat,
            'penerima_surat' => $this->penerimaSurat,
            'tembusan_surat' => $this->tembusanSurat,
            'ringkasan_surat' => $this->ringkasan_surat,
            'isi_surat' => $this->isi_surat,
            'file_surat' => $this->file_surat
        ];
    }
}
