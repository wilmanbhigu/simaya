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
        ;

        $total = $instance->count();

        $instance->when();

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }
}
