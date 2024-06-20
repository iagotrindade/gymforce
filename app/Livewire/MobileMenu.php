<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class MobileMenu extends Component
{
    public $activeMenu;
    public $showingTraining;


    public function render()
    {
        return view('livewire.mobile-menu');
    }

    #[On('openWorkout')]
    public function openWorkout() {
        $this->showingTraining = !$this->showingTraining;
    }

    public function openSearch()
    {
        $this->dispatch('openSearch');
    }
}
