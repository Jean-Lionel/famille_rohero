<?php

namespace App\Models;

use App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membre extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'membres';

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
    protected $fillable = ['firstName', 'lastName', 'telephone', 'email', 'user_id','cellule_id'];

    public function cellule()
    {
        return $this->belongsTo('App\Models\Cellule');
    }
     public function compte()
    {
        return $this->belongsTo(Compte::class,'id','membre_id');
    }

    public static function boot()
    {
        // code...
        parent::boot();

        self::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }


    public function getFullNameAttribute()
    {
       return $this->firstName . ' ' . $this->lastName; 
    }
    
}
