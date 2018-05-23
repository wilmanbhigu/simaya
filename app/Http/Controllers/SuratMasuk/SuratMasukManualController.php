<?php

namespace App\Http\Controllers\SuratMasuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Model\SuratMasuk\SuratMasukManual;

class SuratMasukManualController extends Controller
{
    public function index(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        $search = $request->input('search');
        $limit = $request->input('limit') ?? 10;
        $page = $request->input('page') ?? 1;

        $instance = SuratMasukManual::take($limit)
            /**
             * When the user is NOT super admin
             */
            ->when(!in_array($user->level, [0,1]), function($query) use ($user) {
                $query->when($user->level == 2, function($q) use ($user){
                    
                });
            })
            ->when(is_number($page) && $page > 1, function($query) use ($page, $limit) {
                $skip = ($page - 1) * $limit;
                $query->skip($skip);
            })
        ;
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        
    }
}
