<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Image;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use App\Models\Exercise;

class StudentsArea extends Component
{
    public $manageDisplay = 'none';
    public $addStudentFormDisplay = 'none';
    public $activeManageTab = 'profile';
    public $activeTab = 'weight';
    public $editStudentModalDisplay = 'none';
    public $addWorkoutModalDisplay = 'none';
    public $editWorkoutModalDisplay = 'none';
    public $addExerciseDisplay = 'none';
    public $addExerciseInfoDisplay = 'none';
    public $activeAddUserTab = 'student';

    public $users;
    public $userEdited;
    public $userEditedWorkoutProgress;
    public $exercises;

    #[Rule('image|max:2024')]
    public $newWorkoutImage;
    public $newWorkoutName;
    public $newWorkoutDuration;

    public $workoutEdited;

    public $searchExerciseTerm;

    public $addedExerciseId;
    public $series;
    public $reps;
    public $weight;

    use WithFileUploads;

    public function render()
    {
        if(empty($this->users)) {
            $this->users = User::all();
        }

        if(empty($this->exercises)) {
            $this->exercises = Exercise::all();
        }

        return view('livewire.students-area');
    }

    public function addStudent() {
        $this->addStudentFormDisplay = ($this->addStudentFormDisplay === 'none') ? 'flex' : 'none';
    }

    public function manageStudent($id = null) {
        $this->userEdited = User::find($id);
        $this->userEditedWorkoutProgress = $this->userEdited->workoutProgress ?? "";

        $this->manageDisplay = ($this->manageDisplay === 'none') ? 'block' : 'none';
    }

    public function changeProfileTab($tab) {
        $this->activeTab = $tab;
    }

    public function openEditProfileModal() {
        $this->editStudentModalDisplay = ($this->editStudentModalDisplay === 'none') ? 'flex' : 'none';
    }

    public function changeManageTab($tab) {
        $this->activeManageTab = $tab;
    }

    public function addWorkoutModal() {
        $this->addWorkoutModalDisplay = ($this->addWorkoutModalDisplay === 'none')? 'flex' : 'none';
    }

    public function addWorkoutAction() {
        if($this->validate([
            'newWorkoutName' =>'required',
            'newWorkoutDuration' =>'required',
            'newWorkoutImage' => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048'])) {

            $imgName = $this->newWorkoutImage->store('workouts');
            $uploadedImage = Image::create([
                "name" => $imgName,
                "url" => $imgName
            ]);
        }

        else {
            $uploadedImage = Image::find(1);
        }

        $data = [
            'name' => $this->newWorkoutName,
            'duration' => $this->newWorkoutDuration,
            'user_id' => $this->userEdited->id,
            'image_id' => $uploadedImage->id
        ];

        Workout::create($data);

        $this->addWorkoutModal();
    }

    public function openEditWorkoutModal($id = '') {
        $this->workoutEdited = Workout::find($id);
        $this->editWorkoutModalDisplay = ($this->editWorkoutModalDisplay === 'none') ? 'flex' : 'none';
    }

    public function addExerciseModal() {
        $this->addExerciseDisplay = ($this->addExerciseDisplay === 'none') ? 'flex' : 'none';
    }

    public function addExercise($id = '') {
        $this->addExerciseInfoDisplay = ($this->addExerciseInfoDisplay === 'none') ? 'flex' : 'none';
        $this->addedExerciseId = $id;
    }

    public function addExerciseAction() {
        $this->validate([
            'series' => 'required',
            'reps' => 'required',
            'weight' => 'required',
        ]);

        $data = [
            'series' => $this->series,
            'reps' => $this->reps,
            'reccomended_weight' => $this->weight,
            'user_id' => $this->userEdited->id,
            'workout_id' => $this->workoutEdited->id,
            'exercise_id' => $this->addedExerciseId,
        ];

        WorkoutExercise::create($data);

        $this->addExercise();
    }

    public function searchExercise() {
        $this->exercises = Exercise::where('name', 'like', '%'.$this->searchExerciseTerm.'%')->get();
    }

    public function filterExercises($event) {
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

    public function removeExercise($workout) {
        $exercise = WorkoutExercise::where('workout_id', $workout['workout_id'])
                        ->where('exercise_id', $workout['exercise_id'])
                        ->first();
        $exercise->delete();
    }

    public function filterStudents($event) {
        switch ($event) {
            case 'all':
                $this->users = User::all();
                break;

            case 'teacher':
                $this->users = User::where('role', 'teacher')->get();
                break;

            case 'student':
                $this->users = User::where('role', 'student')->get();
                break;

            case 'recent':
                $this->users = User::orderBy('created_at', 'desc')->limit(5)->get();
                break;
            case 'active':
                $this->users = User::where('status', 'Ativo')->get();
                break;
            case 'inactive':
                $this->users = User::where('status', 'Inativo')->get();
                break;
            default:
                $this->users = User::all();
                break;
            }
    }


    public function changeAddUserTab($tab) {
        $this->activeAddUserTab = $tab;
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

    #[On('searchItems')]
    public function searchItems($searchTerm)
    {
        if(!empty($searchTerm)) {
            $this->users = User::where('name', 'like', ''.$searchTerm.'%')
                ->orWhere('email', 'like', ''.$searchTerm.'%')
            ->get();
        } else {

            $this->users = User::all();
        }
    }
}
