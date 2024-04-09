<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($request)) {
            $abc = $request->all();
            // foreach($abc as $key => $value){
            //     if(preg_match('/-/', $key)){
            //     $abcd = str_replace('-', '_', $key);
            //     $abc[$abcd] = $value;
            //     unset($abc[$key]);
            //     }
            // }   
            $abc = array_combine(
                array_map(function ($key) {
                    return str_replace('-', '_', $key);
                }, array_keys($abc)),
                $abc
            );
        }
        $request->replace($abc);
        return $next($request);
    }
}
