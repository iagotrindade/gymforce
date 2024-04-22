<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class TimerModal extends Component
{
    public $modalDisplay = 'none';

    public function render()
    {
        return view('livewire.timer-modal');
    }

    #[On('openTimerModal')]
    public function changeModalDisplay() {
        $this->modalDisplay = $this->modalDisplay == 'none' ? 'flex' : 'none';
    }
}
