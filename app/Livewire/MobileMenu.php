<?php

namespace App\Livewire;

use Livewire\Component;

class MobileMenu extends Component
{
    public $activeMenu;

    public function render()
    {
        return view('livewire.mobile-menu');
    }
}
