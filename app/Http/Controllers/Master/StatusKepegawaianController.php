<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\StatusKepegawaian;

class StatusKepegawaianController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = StatusKepegawaian::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($query) use ($limit, $page) {
            $skip = ($skip - 1) * $limit;
            $query->skip($skip);
        });

        $result = $instance->get();

        return $this->dataMessage($result, $total, 'Berhasil Mendapatkan Data');
    }

    public function show(StatusKepegawaian $statusKepegawaian)
    {
        return $this->dataMessage($statusKepegawaian, false, 'Berhasil Mendapatkan Detail');
    }

}
