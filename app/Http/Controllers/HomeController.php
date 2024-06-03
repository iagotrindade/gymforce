<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class HomeController extends Controller
{
    public function index (Request $request) {
        return view(Auth::check() ? 'home' : 'login');
    }

    public function adm (Request $request) {
        return view(Auth::check() ? 'adm-home' : 'login');
    }
}
