<?php

namespace App\Http\Livewire;

use App\Models\Membre;
use Livewire\Component;

class HistoryMembre extends Component
{
    public $membreId;
    public $membre;
    
    public function render()
    {
        return view('livewire.history-membre')->extends('layouts.base');
    }

    public function searchMembre(){
        $this->membre = Membre::find($this->membreId);

        if ($this->membre == null) {
            // code...
            session()->flash('error', 'Le numéro du membre est introuvable');
        }
    }
}
