<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

/**
 * Class JwtMiddleware
 * JWT Обработчик входящих api запросов
 *
 * @package App\Http\Middleware
 */
class JwtMiddleware extends BaseMiddleware
{

    /**
     * Обработка входящего запроса.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                $message = 'Token is Invalid';
            } elseif ($e instanceof TokenExpiredException) {
                $message = 'Token is Expired';
            } else {
                $message = 'Authorization Token not found';
            }
            return response()->json(['status' => $message], 400);
        }
        return $next($request);
    }
}
