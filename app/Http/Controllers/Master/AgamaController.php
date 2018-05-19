<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AgamaController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;
        $search = $request->input('search');

        $instance = Agama::take($limit)
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

    public function show(Agama $agama)
    {
        return $this->dataMessage($agama, false, 'Sukses Mendapatkan Data');
    }

    public function destroy(Agama $agama)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($user->level > 2) {
            return $this->errorMessage('Insufficent Permission', 401);
        }

        try {
            $agama->delete();

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
            'nama' => 'required|unique:m_agama',
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $create = new Agama;
            $create->nama = $request->input('nama');
            $create->save();

            return $this->successMessage('Berhasil Menambahkan Data', 200);
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }

    public function update(Agama $agama, Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($user->level > 2) {
            return $this->errorMessage('Insufficent Permission', 401);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:m_agama',
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
//            $create = new Agama;
            $agama->nama = $request->input('nama');
            $agama->save();

            return $this->successMessage('Berhasil Mengubah Data', 200);
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '. $e->getMessage(), 500);
        }
    }
}
