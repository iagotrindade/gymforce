<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request) {
        return view('home');
    }

    public function adm (Request $request) {
        return view('adm-home');
    }
}
