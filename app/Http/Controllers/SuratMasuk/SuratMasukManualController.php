<?php

namespace App\Http\Controllers\SuratMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Model\SuratMasuk\SuratMasukManual;

class SuratMasukManualController extends Controller
{
    public function index(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = SuratMasukManual::take($limit)
            /**
             * When the user is NOT super admin
             */
            ->when(!in_array($user->level, [0,1]), function($query) use ($user) {
                $query->when($user->level == 2, function($q) use ($user){
                    // based on what?
                });
            })
            ->when(is_number($page) && $page > 1, function($query) use ($page, $limit) {
                $skip = ($page - 1) * $limit;
                $query->skip($skip);
            })
        ;
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        $validator = Validator::make($request->all(), [
            'tanggal_terima' => 'required',
            'tanggal_kirim' => 'required',
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
//            'nomor_agenda' =>
            'perihal' => 'required',
            'instansi_pengirim' => 'required', // id
            'jabatan_pengirim' => 'required', // id
            'jenis_instansi' => 'required', // id
//            'alamat_pengirim'
            'klasifikasi' => 'required', // id
            'keamanan_surat' => 'required', //id
            'penerima_surat' => 'required', //id
//            'tembusan_surat'
//            'ringkasan_surat'
//            'isi_surat'
//            'file_surat' =
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }
        

        try {
            SuratMasukManual::create([
                'creator_id' => $user->id,
                'tanggal_terima' => $request->input('tanggal_terima'),
                'tanggal_kirim' => $request->input('tanggal_kirim'),
                'tanggal_surat' => $request->input('tanggal_surat'),
                'nomor_surat' => $request->input('nomor_surat'),
                'nomor_agenda' => $request->input('nomor_agenda'),
                'perihal' => $request->input('perihal'),
                'instansi_pengirim_id' => $request->input('instansi_pengirim'),
                'jenis_instansi_id' => $request->input('jenis_instansi'),
                'alamat_pengirim' => $request->input('alamat_pengirim'),
                'klasifikasi_id' => $request->input('klasifikasi'),
                'keamanan_surat_id' => $request->input('keamanan_surat'),
                'tembusan_surat_id' => $request->input('tembusan_surat'),
                'ringkasan_surat' => $request->input('ringkasan_surat'),
                'isi_surat' => $request->input('isi_surat'),
                'file_surat' => $request->input('file_surat')
            ]);

            return $this->successMessage('Berhasil Menambahkan Data Surat Masuk');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '.$e->getMessage(), 500);
        }
    }
}
