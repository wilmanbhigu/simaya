<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\KeamananSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeamananSuratController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = KeamananSurat::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {
                $query->where('nama', 'like', "%${search}%");
            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function ($query) use ($page, $limit) {

        });

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }
}
