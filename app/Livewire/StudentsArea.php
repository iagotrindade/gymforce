<?php

namespace App\Livewire;

use Livewire\Component;

class StudentsArea extends Component
{
    public $manageDisplay = 'none';
    public $addStudentFormDisplay = 'none';
    public $activeManageTab = 'profile';
    public $activeTab = 'weight';
    public $editStudentModalDisplay = 'none';
    public $editWorkoutModalDisplay = 'none';
    public $addExerciseDisplay = 'none';
    public $addExerciseInfoDisplay = 'none';

    public function render()
    {
        return view('livewire.students-area');
    }

    public function addStudent() {
        $this->addStudentFormDisplay = ($this->addStudentFormDisplay === 'none') ? 'flex' : 'none';
    }

    public function manageStudent() {
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

    public function openEditWorkoutModal() {
        $this->editWorkoutModalDisplay = ($this->editWorkoutModalDisplay === 'none') ? 'flex' : 'none';
    }

    public function addExerciseModal() {
        $this->addExerciseDisplay = ($this->addExerciseDisplay === 'none') ? 'flex' : 'none';
    }

    public function addExerciseAction() {
        $this->addExerciseInfoDisplay = ($this->addExerciseInfoDisplay === 'none') ? 'flex' : 'none';
    }

    public function searchExercise() {
        
    }

    public function filterStudents() {

    }
}
