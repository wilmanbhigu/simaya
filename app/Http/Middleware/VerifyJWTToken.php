<?php

namespace App\Http\Middleware;

use Closure;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = JWTAuth::getToken();
            $apy = JWTAuth::getPayload($token)->get();

            return $next($request);
        } catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
              return response()->json([
                'success' => false,
                'error' => true,
                'message' => 'Token Telah Kadaluarsa, Mohon Coba Login Kembali',
                'code' => 401,
                'data' => [],
                'total' => false,
                'request_time' => microtime(true) - LARAVEL_START,
              ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
              return response()->json([
                'success' => false,
                'error' => true,
                'message' => 'Token Tidak Valid.',
                'code' => 401,
                'data' => [],
                'total' => false,
                'request_time' => microtime(true) - LARAVEL_START,
              ], 401);
            } else {
              return response()->json([
                'success' => false,
                'error' => true,
                'message' => 'Token Dibutuhkan. Mohon Coba Login Kembali.',
                'code' => 401,
                'data' => [],
                'total' => false,
                'request_time' => microtime(true) - LARAVEL_START,
              ], 401);
            }
        }
    }
}
