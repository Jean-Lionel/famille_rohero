<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ListeUser extends Component
{
    public $search;

    public function render()
    {

        $s = $this->search;

        $users  = User::where(function($query) use($s){
            $query->where('name','LIKE', '%'.$s.'%')
                  ->orWhere('email','LIKE', '%'.$s.'%');

        } )->latest()->paginate();

        return view('livewire.liste-user',[
            'users' => $users,
        ])->extends('layouts.base');
    }
}
