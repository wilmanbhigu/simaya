<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pegawai;
use JWTAuth;

class PegawaiController extends Controller
{
    public function profil() {
        return JWTAuth::parseToken()->toUser();
    }
}
