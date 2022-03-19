<?php

namespace App\Models;

use App\Models\Cellule;
use App\Models\Contribution;
use App\Models\Membre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cellule extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cellules';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content'];


    public function membres(){
        return $this->hasmany(Membre::class);
    }


    public function getTotalMontant(){
        $montant = 0;
        foreach ($this->membres as $key => $value) {
            // code...
            $montant += $value->compte->montant ?? 0;
        }

        return $montant;
    }

    public function contributionTypeCotisations(){
        $membres = $this->membres->map->id->toArray();
        $cotisations = Contribution::whereIn('membre_id', $membres)->get();

        dump($cotisations );

        return $cotisations;
    }
    
}
