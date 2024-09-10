<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckContentType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!($request->header("content-type") === "application/json")){
            $body = [
                "status" => false,
                "message" => "CheckContentType",
                "error" => "Verifique se a requisição é do tipo application/json"
            ];
            
            return response($body, Response::HTTP_BAD_REQUEST);
        }
        return $next($request);
    }
}
