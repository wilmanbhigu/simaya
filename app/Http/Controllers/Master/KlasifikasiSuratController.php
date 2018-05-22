<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\KlasifikasiSurat;
use JWTAuth;

class KlasifikasiSuratController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = KlasifikasiSurat::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like' , "%${search}%");
            })
        ;
        
        $total = $instance->count();
        
        $instance->when(is_numeric($page) && $page > 1, function($query) use ($page, $limit) {
            $skip = ($page - 1) * $limit;
            $query->skip($skip);
        });

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }

    public function show(KlasifikasiSurat $klasifikasiSurat) 
    {
        return $this->dataMessage($klasifikasiSurat, false);
    }

    
    public function store(Request $request) {
        $user = JWTAuth::parseToken()->toUser();

        if ($user->level > 2) {
            return $this->errorMessage('Insufficent Priviledge', 401);
        }
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $create = new KlasifikasiSurat;
            $create->nama = $request->input('nama');
            $create->save();

            return $this->successMessage('Berhasil Menambahkan Jenis Klasifikasi');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }

    public function update(KlasifikasiSurat $klasifikasiSurat, Request $request) 
    {
        $user = JWTAuth::parseToken()->toUser();

        if ($user->level > 2) {
            return $this->errorMessage('Insufficent Priviledge', 401);
        }
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $klasifikasiSurat->nama = $request->input('nama');
            $klasifikasiSurat->save();

            return $this->successMessage('Berhasil Mengubah Jenis Klasifikasi');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }

    public function destroy(KlasifikasiSurat $klasifikasiSurat)
    {
        $user = JWTAuth::parseToken()->toUser();

        if($user->level > 2) {
            return $this->errorMessage('Insufficent Priviledge', 401);
        }

        try {
            $klasifikasiSurat->delete();

            return $this->successMessage('Berhasil Menghapus Jenis Klasifikasi');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '.$e->getMessage(), 500);
        }
    }
}
