<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Middleware\VerifyJWTToken;
/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"http"},
 *     host="simaya.id",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="@ragasubekti/siMAYA",
 *         description="Dokumentasi API siMAYA",
 *         @SWG\Contact(
 *             email="ragasubekti@outlook.com"
 *         ),
 *     )
 * )
 */

/**
 * @SWG\SecurityScheme(
 *      securityDefinition="JWT",
 *      type="apiKey",
 *      in="header",
 *      name="Authorization",
 *      scopes={},
 *      description="Untuk mengakses beberapa API dibutuhkan JWT, contoh header: Bearer xxxx.xxxxxxxxxx.xxxx"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->middleware(VerifyJWTToken::class)->except(['verifyCredentials']);
    }

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
            'request_time' => microtime(true) - LARAVEL_START,
        ], $code);
    }

    public function dataMessage($data = [], $total = 0, $message = '', $code = 200) {
        return response()->json([
            'success' => true,
            'error' => false,
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'total' => $total,
            'request_time' => microtime(true) - LARAVEL_START,
        ], $code);
    }

    public function errorMessage($message = '', $code = 400) {
        return response()->json([
            'success' => false,
            'error' => true,
            'message' => $message,
            'code' => $code,
            'data' => [],
            'total' => false,
            'request_time' => microtime(true) - LARAVEL_START,
        ], $code);
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
