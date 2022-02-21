<?php

namespace App\Http\Livewire;

use App\Models\Cellule;
use App\Models\Compte;
use App\Models\Membre;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data = [];

        $total_membres = Membre::all()->count();
        $montantTotal = Compte::all()->sum('montant');
        $celluleTotal = Cellule::all()->count();

        return view('livewire.dashboard',[
            'total_membres' => $total_membres,
            'montantTotal' => $montantTotal,
            'celluleTotal' => $celluleTotal,

        ])->extends('layouts.base');
    }
}
