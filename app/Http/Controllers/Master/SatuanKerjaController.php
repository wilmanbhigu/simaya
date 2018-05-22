<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\SatuanKerja;

class SatuanKerjaController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page');

        $instance = SatuanKerja::take($limit);

        $total = $instance->count();

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }
}
