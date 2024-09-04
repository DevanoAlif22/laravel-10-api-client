<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionNotLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->session()->has('token')) {
            $apiUrl = config('api.base_url') . '/check-token';
            $response = Http::withToken(session('token'))->get($apiUrl);
            if($response->json()['success'] == true){
                // Jika tidak ada, redirect ke halaman login
                return redirect('/dashboard');
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }


    }
}
