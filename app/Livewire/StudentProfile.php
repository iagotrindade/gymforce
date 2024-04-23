<?php

namespace App\Livewire;

use Livewire\Component;

class StudentProfile extends Component
{
    public $activeTab = 'weight';
    public $modalDisplay = 'none';

    public function render()
    {
        return view('livewire.student-profile');
    }

    public function changeProfileTab($tab) {
        $this->activeTab = $tab;
    }

    public function openEditProfileModal() {
        $this->modalDisplay = ($this->modalDisplay === 'none') ? 'flex' : 'none';
    }
}
