<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\Exercise;

class AdmSearch extends Component
{
    public $searchDisplay = 'none';
    public $searchTerm;

    public function render()
    {
        return view('livewire.adm-search');
    }

    #[On('openSearch')]
    public function openSearch()
    {
        $this->searchDisplay = ($this->searchDisplay === 'none') ? 'block' : 'none';
    }

    public function searchItems()
    {
        $this->dispatch('searchItems', $this->searchTerm);
    }
}
