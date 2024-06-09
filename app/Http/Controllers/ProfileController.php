<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $user;

    public function index(Request $request) {

        $this->user = Auth::user();

        return view('profile', [
            'user' => $this->user
        ]);
    }
}
