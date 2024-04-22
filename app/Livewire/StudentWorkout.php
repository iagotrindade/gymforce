<?php

namespace App\Livewire;

use Livewire\Component;

class StudentWorkout extends Component
{
    public $activeTab = 'workout';

    public function render()
    {
        return view('livewire.student-workout');
    }

    public function toggleTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function finishExercise() {

    }
}
