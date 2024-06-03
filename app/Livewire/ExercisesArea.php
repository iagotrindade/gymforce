<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use App\Models\ExerciseMedias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ExercisesArea extends Component
{
    public $exercises;
    public $editedExercise;

    public $addExerciseDisplay = 'none';
    public $editExerciseDisplay = 'none';

    public function render()
    {
        if(empty($this->exercises)) {
            $this->exercises = Exercise::all();
        }

        return view('livewire.exercises-area');
    }

    public function addExercise() {
        $this->addExerciseDisplay = ($this->addExerciseDisplay === 'none') ? 'flex' : 'none';
    }

    public function editExercise($id) {
        $this->editedExercise = Exercise::find($id);
        $this->editExerciseDisplay = ($this->editExerciseDisplay === 'none') ? 'flex' : 'none';
    }

    public function filterExercise($event) {
        switch ($event) {
            case 'all':
                $this->exercises = Exercise::all();
                break;

            case 'recent':
                $this->exercises = Exercise::orderBy('created_at', 'desc')->limit(5)->get();
                break;

            default:
                $this->exercises = Exercise::all();
                break;
            }
    }

    public function deleteExercise($id) {
        $exercise = Exercise::find($id);
        $exercise->delete();

        if($exercise->media->id != 1) {
            Storage::delete([$exercise->media->url]);
            $exercise->media->delete();
        }

        return redirect(route('workout.adm'));
    }
}
