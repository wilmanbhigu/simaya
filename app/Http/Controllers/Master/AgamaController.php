<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
