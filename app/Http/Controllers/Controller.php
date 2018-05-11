<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $req) {
        return $this->successMessage('Welcome to siMAYA API');
    }

    public function successMessage($message = '', $code = 200) {
        return response()->json([
            'success' => true,
            'error' => false,
            'message' => $message,
            'code' => $code,
            'data' => [],
            'total' => false,
        ]);
    }

    public function dataMessage($data = [], $total = 0, $message = '', $code = 200) {
        return response()->json([
            'success' => true,
            'error' => false,
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'total' => $total,
        ]);
    }

    public function errorMessage($message = '', $code = 400) {
        return response()->json([
            'success' => false,
            'error' => true,
            'message' => $message,
            'code' => $code,
            'data' => [],
            'total' => false,
        ]);
    }
    
    public function validationMessage($validator) {
        $validator = collect($validator);
        $bag = [];

        foreach($validator->all() as $val) {
            array_push($bag, $val[0]);
        }

        if(count($bag) > 1) {
            return $bag;
        }
        return $bag[0];
    }
}
