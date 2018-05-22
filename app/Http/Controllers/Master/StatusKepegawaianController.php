<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\StatusKepegawaian;

class StatusKepegawaianController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit');
        $page = $request->input('page');

        $instance = StatusKepegawaian::take($limit);

        $total = $instance->count();

        $result = $instance->get();

        return $this->dataMessage($result, $total);
    }
}
