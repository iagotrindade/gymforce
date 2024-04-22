<?php

namespace App\Livewire;

use Livewire\Component;

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
}
