<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $name = session('name');
        return view('dashboard', compact('name'));
    }
}
