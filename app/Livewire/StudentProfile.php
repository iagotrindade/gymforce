<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StudentProfile extends Component
{
    public $activeTab = 'weight';
    public $modalDisplay = 'none';
    public $user;
    public $userEditedWorkoutProgress;

    public function render()
    {
        $this->user = Auth::user();
        $this->userEditedWorkoutProgress = $this->user->workoutProgress ?? "";
        return view('livewire.student-profile');
    }

    public function changeProfileTab($tab) {
        $this->activeTab = $tab;
    }

    public function openEditProfileModal() {
        $this->modalDisplay = ($this->modalDisplay === 'none') ? 'flex' : 'none';
    }

    public function calcImc($imc) {
        switch ($imc) {

            case $imc <= 18.4:
                return "#48cae4";
                break;

            case $imc >= 18.5 && $imc < 24.9:
                return "#00b4d8";
                break;

            case $imc >= 25.0 && $imc < 29.9:
                return "#0096C7";
                break;

            case $imc >= 30.0 && $imc < 39.9:
                return "#0077B6";
                break;

            case $imc >= 40.0:
                return "#023E8A";
                break;
        }

    }
}
