<?php

namespace App\Http\Livewire;

use App\Models\Contribution;
use Livewire\Component;

class ListeContribution extends Component
{
    public function render()
    {
        $contributions = Contribution::latest()->paginate();

        return view('livewire.liste-contribution',[
            'contributions' => $contributions

        ])->extends('layouts.base');
    }
}
