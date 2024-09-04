<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index() {
        $apiUrl = config('api.base_url') . '/product';
        $response = Http::withToken(session('token'))->get($apiUrl);
        $data = $response->json()['data'];
        $name = session('name');
        return view('product', compact(['data','name']));
    }

    public function delete($id) {
        $apiUrl = config('api.base_url') . '/product/'. $id;
        $response = Http::withToken(session('token'))->delete($apiUrl);

        if($response->json()['success'] == false) {
            return response()->json([
                'error' => $response->json()['message']
            ], 400);
        } else {
            return response()->json([
                'success' => 'Product successfully deleted.'
            ], 200);
        }
    }

    public function store(Request $request) {
        $apiUrl = config('api.base_url') . '/product';
        $response = Http::withToken(session('token'))->post($apiUrl,
        [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]
        );

        if($response->json()['success'] == false) {
            return response()->json([
                'error' => $response->json()['message']
            ], 400);
        } else {
            return response()->json([
                'success' => 'Product successfully deleted.',
                'data' => $response->json()['data']
            ], 200);
        }
    }
    public function update(Request $request, $id) {
        $apiUrl = config('api.base_url') . '/product/' . $id;
        $response = Http::withToken(session('token'))->patch($apiUrl,
        [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]
        );

        if($response->json()['success'] == false) {
            return response()->json([
                'error' => $response->json()['message']
            ], 400);
        } else {
            return response()->json([
                'success' => 'Product successfully updated.',
                'data' => $response->json()['data']
            ], 200);
        }
    }
}
