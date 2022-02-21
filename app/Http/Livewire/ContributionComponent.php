<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContributionComponent extends Component
{
    public function render()
    {
        return view('livewire.contribution-component')->extends('layouts.base');
    }
}
