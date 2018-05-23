<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Kecamatan;

class KecamatanController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page');

        $instance = Kecamatan::take($limit)
            ->when(strlen($search) > 0, function($query) use($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($query) use($limit, $page) {

        });

        $result = $instance->get();

        return $this->dataMessage($result, $total, 'Berhasil Mendapatkan Data');
    }

    public function show(Kecamatan $kecamatan)
    {
        return $this->dataMessage($kecamatan, false, 'Berhasil Mendapatkan Detail');
    }
}
