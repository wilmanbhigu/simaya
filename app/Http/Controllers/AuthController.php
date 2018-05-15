<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\Simpeg;
use App\Model\Pegawai;
use App\User;

class AuthController extends Controller
{
    public function verifyCredentials(Request $req) {
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            $messageBag = $this->validationMessage($validator->errors());
            return $this->errorMessage($messageBag, 400);
        }

        $credentials = $req->only(['username', 'password']);
       
        $simpeg = new Simpeg();
        $pegawai = User::where('username', $req->input('username'))->first();
        
        if($token = auth()->attempt($credentials)) {
            return $this->respondWithToken($token);
        } else if($pegawai) {
            return $this->errorMessage('Username atau Password salah!', 401);
        } else {
            $apiResult = $simpeg->checkUserFromApi($req->input('username'));
            $token = auth()->attempt($credentials);

            return $token ? $this->respondWithToken($token) : $this->errorMessage('Username atau Password salah!', 401); 
        }

        // return $this->respondWithToken($token);
    }

    private function checkFromSimpeg($username) {
        
    }

    public function respondWithToken($token) {
        return $this->dataMessage([
            'token' => $token,
            'type' => 'bearer',
            'expires' => 3600
        ], false, 'Berhasil Login');
    }
}
