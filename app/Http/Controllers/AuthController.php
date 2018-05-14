<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        
        if(!($token = auth()->attempt($credentials))) {
            return $this->errorMessage('Username atau Password salah!', 401);
        }

        return $this->respondWithToken($token);
    }

    public function respondWithToken($token) {
        return $this->dataMessage([
            'token' => $token,
            'type' => 'bearer',
            'expires' => 3600
        ], false, 'Berhasil Login');
    }
}
