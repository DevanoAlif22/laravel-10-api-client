<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah session 'name' ada
        if (!$request->session()->has('token')) {
            // Jika tidak ada, redirect ke halaman login
            Session::flush();
            return redirect('/login');
        } else {
            $apiUrl = config('api.base_url') . '/check-token';
            $response = Http::withToken(session('token'))->get($apiUrl);
            if($response->json()['success'] == false) {
                Session::flush();
                return redirect('/login');
            } else {
                return $next($request);
            }
        }


    }
}
