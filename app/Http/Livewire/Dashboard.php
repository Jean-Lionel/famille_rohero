<?php

namespace App\Http\Livewire;

use App\Models\Cellule;
use App\Models\Compte;
use App\Models\Membre;
use App\Models\TypeCotisation;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data = [];

        $total_membres = Membre::all()->count();
        $montantTotal = Compte::all()->sum('montant');
        $celluleTotal = Cellule::all()->count();
        $typeCotisationTotal = TypeCotisation::all()->count();
        $cellulesMontant = Cellule::all();

        return view('livewire.dashboard',[
            'total_membres' => $total_membres,
            'montantTotal' => $montantTotal,
            'celluleTotal' => $celluleTotal,
            'typeCotisationTotal' => $typeCotisationTotal,
            'cellulesMontant' => $cellulesMontant,

        ])->extends('layouts.base');
    }
}
