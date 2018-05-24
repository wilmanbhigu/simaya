<?php

namespace App\Http\Controllers\Pegawai;

use App\Model\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenerimaController extends Controller
{
    // TODO: ADD FILTER BASED ON THE INSTANSI
    public function index(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 10;

        $instance = Pegawai::take($page)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($query) use ($page, $limit) {
            $skip = ($page - 1) * 10;
            $query->skip($skip);
        });

        $result = $instance->get();

        return $this->dataMessage($result, $total, 'Berhasil Mendapatkan Data Penerima');
    }
}
