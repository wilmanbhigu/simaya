<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index(Request $req) {
        $limit = $req->input('limit') ?? 10;
        $search = $req->input('search');
        $page = $req->input('page') ?? 1;

        $instance = Jabatan::take($limit)
            ->when(strlen($search) > 0, function($q) use ($search) {
               $q->where('nama', 'like', "%${search}%");
            });

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($q) use ($page, $limit) {
                $skip_to = ($page - 1) * $limit;
                $q->skip($limit);
            })
        ;

        $result = $instance->get();

        return $this->dataMessage($result, $total, 'Berhasil Mendapatkan Data');
    }

    public function show(Jabatan $jabatan, Request $request) {
        return $this->dataMessage($jabatan, false);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:m_jabatan',
            'nama' => 'required'
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $create = new Jabatan;
            $create->kode = $request->input('kode');
            $create->nama = $request->input('nama');
            $create->save();

            return $this->successMessage('Berhasil Membuat Jabatan');
        } catch (\Exception $e) {
            return $this->errorMessage($e->getMessage(), 500);
        }

    }

    public function update(Jabatan $jabatan, Request $request) {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:m_jabatan',
            'nama' => 'required'
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $jabatan->kode = $request->input('kode');
            $jabatan->nama = $request->input('nama');
            $jabatan->save();

            return $this->successMessage('Berhasil Mengubah Jabatan');
        } catch (\Exception $e) {
            return $this->errorMessage($e->getMessage(), 500);
        }
    }

    public function destroy(Jabatan $jabatan) {
        try {
            $jabatan->delete();

            return $this->successMessage('Berhasil Menghapus Jabatan');
        } catch (\Exception $e) {
            return $this->errorMessage($e->getMessage());
        }
    }
}
