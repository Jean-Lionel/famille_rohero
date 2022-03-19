<?php

namespace App\Http\Livewire;

use App\Models\Cellule;
use Livewire\Component;

class RapportCellule extends Component
{
    public function render()
    {
        $cellules = Cellule::latest()->paginate();

        return view('livewire.rapport-cellule',[
            'cellules' => $cellules
        ])->extends("layouts.base");
    }
}
