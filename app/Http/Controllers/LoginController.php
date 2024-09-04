<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
    $apiUrl = config('api.base_url') . '/login/user';
    $response = Http::post($apiUrl, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($response->json()['success'] == false) {
            return redirect('/login')->with('error', $response->json()['message']);
        } else {
            // Menggunakan Session::put
            Session::put('name', $response->json()['data']['name']);
            Session::put('email', $response->json()['data']['email']);
            Session::put('token', $response->json()['data']['token']);
            Session::put('role_id', $response->json()['data']['role_id']);

            return redirect('/dashboard');
        }
    }

    public function logout() {
        $token = session('token');
        $apiUrl = config('api.base_url') . '/logout/user';
        $response = Http::withToken($token)->post($apiUrl);
        if ($response->json()['success'] == true) {
            // Hapus semua session setelah berhasil logout
            Session::forget(['name', 'email', 'token']);
            return redirect('/login')->with('success', 'Anda berhasil logout.');
        } else {
            return redirect('/dashboard')->with('error', $response->json()['message']);
        }
    }

    public function register() {
        return view('register');
    }

    public function registerPost(Request $request) {
        $apiUrl = config('api.base_url') . '/register/user';
        $response = Http::post($apiUrl, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'confirmPassword' => $request->confirmPassword
        ]);

        if ($response->json()['success'] == true) {
            return redirect('/login')->with('success', 'Berhasil Membuat Akun.');
        } else {
            return redirect('/register')->with('error', $response->json()['message']);
        }
    }
}
