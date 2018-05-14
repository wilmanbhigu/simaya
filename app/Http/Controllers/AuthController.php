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
            return $this->errorMessage($messageBag, 401);
        }

    }
}
