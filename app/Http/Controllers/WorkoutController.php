<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index(Request $request) {
        return view('workout');
    }

    public function adm(Request $request) {
        return view('adm-exercises');
    }
}
