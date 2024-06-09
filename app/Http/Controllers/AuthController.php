<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request) {
        return view('login');
    }

    public function changePassword(Request $request) {
        return view('change-password', [
            'token' => $request->token
        ]);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->only('email'))->first();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->withErrors(['email' => 'Senha alterada com sucesso'])
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout() {
        auth()->logout();
        return redirect(route('login'));
    }
}
