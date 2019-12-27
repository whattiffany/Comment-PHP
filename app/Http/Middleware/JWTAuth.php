<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Closure;
use Auth;

class JWTAuth extends BaseMiddleware
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
        try{
            $this->auth->parseToken()->authenticate();
            $user = Auth::guard()->user();
            if($user){
                $request['user']=$user;
                return $next($request);
            }
            return response()->json(['未登入'],400);
        }catch(JWTException $exception){
            return response()->json(['未登入'],400);
        }
    }
}
