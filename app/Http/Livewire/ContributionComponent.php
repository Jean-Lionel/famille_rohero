<?php

namespace App\Http\Livewire;

use App\Models\Contribution;
use App\Models\Membre;
use App\Models\TypeCotisation;
use DB;
use Livewire\Component;

class ContributionComponent extends Component
{
    public $membreId;
    public $membre;
    public $cotisationId;
    public $montant;
    public $description;
    public $showForm = false;

    public function render()
    {
        $typecotisations = TypeCotisation::latest()->limit(10)->get();

        return view('livewire.contribution-component',[
            'typecotisations' => $typecotisations
        ])->extends('layouts.base');
    }

    protected $rules = [
        'cotisationId' => 'required',
        'montant' => 'required|min:0',
    ];

    public function searchMembre(){
        $this->membre = Membre::find($this->membreId);
        $this->showForm = false;
    }

    public function validerMembre(){

    }

    public function savePaiment(){
        $this->validate();

        try {
            DB::beginTransaction();

            $data = [
                'membre_id' => $this->membre->id,
                'typecotisation_id' => $this->cotisationId,
                'montant' => $this->montant,
                'description' => $this->description,
            ];

            $this->membre->compte->montant += $this->montant;
            $this->membre->compte->save();
            Contribution::create($data);
            session()->flash('success', "Opération effectué avec succès");

            DB::commit();
        } catch (\Exception $e) {
            Db::rollback();

            session()->flash('error', $e->getMessage());

        }
    }


}
