<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HistoryMembre extends Component
{
    public $membreId;
    
    public function render()
    {
        return view('livewire.history-membre')->extends('layouts.base');
    }
}
