<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->header('Authorization')) {
            $token = explode(" ", $request->header('Authorization'))[1];
            try {
                JWT::decode($token, 'HELLO', array('HS256'));
                
            } catch (\Throwable $th) {
                abort('error');
            }
        }

        return $next($request);
    }
}
