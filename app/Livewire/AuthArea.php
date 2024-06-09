<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Session;
use App\Models\AccessToken;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendLoginToken;
use App\Notifications\sendLoginWarning;
use Livewire\Attributes\On;


class AuthArea extends Component
{
    public $loadingScreen = 'none';
    public $tabDisplay = [
        'choseLogin' => 'flex',
        'teacher' => 'none',
        'student' => 'none',
        'forgotPass' => 'none',
        'confirmLogin' => 'none'
    ];
    public $chosenTab = 'aluno';

    public $resendCodeCount = false;

    //User Login Data
    public $user;

    #[Validate('required', message: 'Por favor, informe sua matrícula')]
    #[Validate('min:8', message: 'Sua matrícula deve ter ao menos 8 dígitos')]
    public $inscription = '';
    public $studentRemember = '';

    //Teacher Login Data
    #[Validate('required', message: 'Informe seu email')]
    #[Validate('email', message: 'Informe um email válido')]
    public $email = '';
    #[Validate('required', message: 'Informe sua senha')]
    #[Validate('min:8', message: 'A senha deve ter no mínimo 8 dígitos')]
    public $password = '';
    public $teacherRemember = '';

    //Confirm Login Data
    public $confirmDigits = [];

    public function render()
    {
        return view('livewire.auth-area');
    }

    public function changeLoginTab($type)
    {
        foreach ($this->tabDisplay as $key => $value) {
            $this->tabDisplay[$key] = $key == $type ? 'flex' : 'none';
        }
        $this->chosenTab = $type == 'teacher' ? 'professor' : 'aluno';
    }

    public function backToChoiceLogin()
    {
        $this->tabDisplay = array_map(function ($value) {
            return 'none';
        }, $this->tabDisplay);
        $this->tabDisplay['choseLogin'] = 'flex';
    }

    public function studentLogin() {
        $this->validate([
            'inscription' => 'required|min:8',
        ]);

        $this->user = User::where('inscription', $this->inscription)->first();

        if($this->user && Hash::check($this->inscription, $this->user->password)) {
            $this->sendLoginToken();
        } else {
            $this->addError('inscription', 'Matrícula não encontrada');
        }
    }

    public function teacherLogin() {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $this->user = User::where('email', $this->email)->first();

        if($this->user && Hash::check($this->password, $this->user->password)) {
            $this->sendLoginToken();
        } else {
            $this->addError('email', 'Email não encontrado');
        }
    }

    public function sendLoginToken() {
        AccessToken::where('user_id', $this->user->id)->delete();

        $accessToken = strval(mt_rand(100000, 999999));
        $expiration = Carbon::now()->addMinutes(15);

        AccessToken::create([
            'token' => Hash::make($accessToken),
            'expiration' => $expiration,
            'user_id' => $this->user->id
        ]);

        Notification::send($this->user, new SendLoginToken($this->user, $accessToken));
        $this->changeLoginTab('confirmLogin');

        $this->dispatch('sendLoginToken');
    }

    public function confirmLogin() {
        $token = "";
        foreach ($this->confirmDigits as $number) {
            $token = $token.$number;
        }

        if(Hash::check($token, $this->user->accessToken->last()->token) && $this->user->accessToken->last()->used !== 1) {
            if($this->user->getRoleNames()[0] === 'student') {
                $this->loginAction('inscription', $this->user->inscription, $this->user->inscription, $this->studentRemember, 'home');
            } else {
                $this->loginAction('email', $this->email, $this->password, $this->teacherRemember, 'adm');
            }

        } else {

            $this->addError('token', 'Seu código é inválido ou expirou');
        }
    }

    public function loginAction($field, $value, $pasword, $remember, $redirectRoute) {
        $credentials = [$field => $value];

        $credentials['password'] = $pasword;

        if (Auth::attempt($credentials, $remember)) {
            $this->user->accessToken->last()->update([
                'used' => 1
            ]);

            $this->sendLoginWarning();

            return redirect(route($redirectRoute));
        } else {
            $this->addError('token', 'Credenciais inválidas');
            return redirect()->back()->withErrors(['message' => 'Credenciais inválidas'])->withInput();
        }
    }

    public function sendLoginWarning() {
        Notification::send($this->user, new sendLoginWarning($this->user));
    }

    public function forgotPass() {
        $this->validate([
            'email' =>'required|email'
        ]);

        $this->user = User::where('email', $this->email)->first();

        $status = Password::sendResetLink($this->validate([
            'email' =>'required|email'
        ]));

        if($status == 'passwords.throttled') {
            $this->addError('reset', 'Enviamos um email para alterar sua senha');
        } else {
            $this->addError('reset', 'Email não encontrado');
        }
    }

    private function getMinutes()
    {
        return (int)explode(':', $this->resendCodeCount)[0];
    }

    private function getSeconds()
    {
        return (int)explode(':', $this->resendCodeCount)[1];
    }
}
