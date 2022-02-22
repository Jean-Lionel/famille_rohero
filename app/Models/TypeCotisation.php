<?php

namespace App\Models;

use App\Models\Contribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeCotisation extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_cotisations';

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
    protected $fillable = ['name', 'description'];

    public function contribution(){
        return $this->hasmany(Contribution::class,'typecotisation_id');
    }

    public function montantContribuer(){

    }

    
}
