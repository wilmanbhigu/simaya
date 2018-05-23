<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\GolonganDarah;

class GolonganDarahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = GolonganDarah::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($query) use ($limit, $page) {
            $skip = ($page - 1) * $limit;
            $query->skip($skip);
        });

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }

    public function show(GolonganDarah $golonganDarah)
    {
        return $this->dataMessage($golonganDarah, false);
    }
}
