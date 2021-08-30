<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuthToken;

class TokenValidation
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
        $authToken = $request->header('token');
        if(!isset($authToken))
        {
            return response()->json([
                'error' => 'Token is required',
                'code' => 401,

            ], 401);
        }
        //$tokenDetails = AuthToken::where('email', '=', Input::get('email'))->first();
        if(AuthToken::where('token', $authToken)->count() == 0)
        {
            return response()->json([
                'error' => 'Invalid token',
                'code' => 401,

            ], 401);
        }
        return $next($request);
    }
}
