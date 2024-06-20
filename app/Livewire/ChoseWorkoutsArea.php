<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutProgress;

class ChoseWorkoutsArea extends Component
{
    public $workoutDisplay = "none";
    public $activeWorkout;
    public $activeExercise;
    public $activeTab = 'workout';

    public $markedItemIds = [];

    public $canFinalizeWorkout = false;
    public $exercisesCount = 0;
    public $exercisesDoneCount = 0;
    public $exercisesDonePercent = 0;

    public function render()
    {
        return view('livewire.chose-workouts-area');
    }

    public function openWorkout($id)
    {
        $this->activeWorkout = Workout::find($id);
        $this->exercisesCount = $this->activeWorkout->exercises()->count();

        $this->workoutDisplay = ($this->workoutDisplay === 'none') ? 'flex' : 'none';

        $this->dispatch('openWorkout');
    }

    public function toggleTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function openExerciseInfo($id)
    {
        $this->activeExercise = Exercise::find($id);

        $this->toggleTab('exercise');
    }

    public function finishExercise($exerciseId)
    {
        $key = array_search($exerciseId, $this->markedItemIds);

        if ($key !== false) {
            unset($this->markedItemIds[$key]);
            $this->exercisesDoneCount--;
        } else {
            $this->markedItemIds[] = $exerciseId;
            $this->exercisesDoneCount++;
        }

        $this->exercisesDonePercent = ($this->exercisesDoneCount / $this->exercisesCount) * 100;
        $this->canFinalizeWorkout = $this->exercisesDoneCount >= ($this->exercisesCount / 2);

        $this->toggleTab('workout');
    }

    public function finishWorkout()
    {
        $data = [
            'week' => $this->getWeekOfMonth(),
            'workout_id' => $this->activeWorkout->id,
            'user_id' => Auth::user()->id
        ];

        WorkoutProgress::create($data);
    }

    public function getWeekOfMonth()
    {
        $date = date('Y-m-d');
        $firstDayOfMonth = strtotime(date('Y-m-01', strtotime($date)));
        $dayOfMonth = date('j', strtotime($date));
        $weekOfMonth = ceil($dayOfMonth / 7);
        return $weekOfMonth;
    }
}
