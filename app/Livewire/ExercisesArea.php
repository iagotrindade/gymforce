<?php

namespace App\Livewire;

use Livewire\Component;

class ExercisesArea extends Component
{
    public $addExerciseDisplay = 'none';
    public $editExerciseDisplay = 'none';

    public function render()
    {
        return view('livewire.exercises-area');
    }

    public function addExercise() {
        $this->addExerciseDisplay = ($this->addExerciseDisplay === 'none') ? 'flex' : 'none';
    }

    public function editExercise() {
        $this->editExerciseDisplay = ($this->editExerciseDisplay === 'none') ? 'flex' : 'none';
    }
}
