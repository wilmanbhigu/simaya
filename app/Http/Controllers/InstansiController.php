<?php

namespace App\Http\Controllers;

use App\Model\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;
        $search = $request->input('search');

        $instance = Instansi::take($limit)
            ->when(is_numeric($page) && $page > 1, function ($query) use ($limit, $page) {
                $skip = ($page - 1) * $limit;
                $query->skip($skip);
            })
        ;

        $total = $instance->count();

        $instance
            ->when(!empty($search) && strlen($search) > 0, function ($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $result = $instance->get();

        return $this->dataMessage($result, $total, 'Sukses Mendapatkan Data');
    }

    public function show(Instansi $instansi)
    {
        return $this->dataMessage($instansi, false, 'Sukses Mendapatkan Data');
    }

    public function destroy(Instansi $instansi)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($user->level > 2) {
            return $this->errorMessage('Insufficent Permission', 401);
        }

        try {
            $instansi->delete();

            return $this->successMessage('Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($user->level > 2) {
            return $this->errorMessage('Insufficent Permission', 401);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $create = new Instansi;
            $create->nama = $request->input('nama');
            $create->save();

            return $this->successMessage('Berhasil Menambahkan Data', 200);
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }

    public function update(Instansi $instansi, Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($user->level > 2) {
            return $this->errorMessage('Insufficent Permission', 401);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
//            $create = new Agama;
            $instansi->nama = $request->input('nama');
            $instansi->save();

            return $this->successMessage('Berhasil Mengubah Data', 200);
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }
}
