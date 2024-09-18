<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedVerifyMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('sanctum')->user()){
            return response()->json([
                'message'=>'Você já está logado'
            ], 404);
        }
        return $next($request);
    }
}
