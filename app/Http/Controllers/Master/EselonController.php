<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Eselon;

class EselonController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = Eselon::take($limit)
            ->when(strlen($search) > 0, function($query) use ($search) {

            })
        ;

        $total = $instance->count();

        $instance->when(is_numeric($page) && $page > 1, function($query) use ($page, $limit) {
            $skip = ($page - 1) * $limit;
            $query->skip($skip);
        });

        $results = $instance->get();

        return $this->dataMessage($results, $total);
    }
}
