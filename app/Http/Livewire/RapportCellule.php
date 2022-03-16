<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RapportCellule extends Component
{
    public function render()
    {
        return view('livewire.rapport-cellule')->extends("layouts.base");
    }
}
