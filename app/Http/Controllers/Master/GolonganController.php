<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Golongan;

class GolonganController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 10;

        $instance = Golongan::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page), function($query) use ($page, $limit) {
            $skip = ($page - 1) * $limit;
            $query->skip($skip);
        });

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }

    public function show(Golongan $golongan)
    {
        return $this->dataMessage($golongan, false);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required'
        ]);

        if($validator->fails()) {
            return $this->errorMessage($this->validationMessage($validator->errors()));
        }

        try {
            $create = new Golongan;
            $create->nama = $request->input('nama');
            $create->kode = $request->input('kode');
            $create->save();

            return $this->successMessage('Berhasil Menambahkan Golongan');
        } catch (\Exception $e) {
            return $this->errorMessage('Internal Server Error: '.$e->getMessage(), 500);
        }
    }

    public function update(Golongan $golongan, Request $request) 
    {
        
    }
}
