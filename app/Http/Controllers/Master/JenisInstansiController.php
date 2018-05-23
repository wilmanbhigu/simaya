<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\JenisInstansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisInstansiController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = JenisInstansi::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query
                    ->where('nama', 'like', "%${search}%")
//                    ->orWhere('kode', '')
                ;
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

    public function show(JenisInstansi $jenisInstansi)
    {
        return $this->dataMessage($jenisInstansi, false);
    }
}
