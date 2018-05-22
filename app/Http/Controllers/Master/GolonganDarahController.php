<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\GolonganDarah;

class GolonganDarahController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit');
        $page = $request->input('page');

        $instance = GolonganDarah::take($limit);

        $total = $instance->count();

        $instance->when();

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }
}
