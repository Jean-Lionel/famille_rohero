<?php

namespace App\Http\Livewire;

use App\Models\Membre;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use DB;

class ProfileComponent extends Component
{
    public $identifyMember;
    public $membre;
    public $createdUser;


    public function render()
    {
        return view('livewire.profile-component')->extends('layouts.base');
    }

    public function searchMembre(){
        $this->membre = Membre::find($this->identifyMember);
    }

    public function setUserMembre(){

        $user = [
            'name' =>  $this->membre->fullname,
            'email' => $this->membre->email,
            'email_verified_at' => now(),
            'password' => bcrypt('rohero'), // password
            'remember_token' => Str::random(10),
            'role' => 'MEMBRE'
        ];

        try {
            DB::beginTransaction();
            $this->createdUser = User::create($user);
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $this->membre->fullname. ' est déjà définit comme utilisateur');
        }
    }
}
