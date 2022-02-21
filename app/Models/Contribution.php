<?php

namespace App\Models;

use App\Models\Membre;
use App\Models\TypeCotisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function membre()
    {
        // code...
        return $this->belongsTo(Membre::class);
    }
    public function cotisation()
    {
        // code...
        return $this->belongsTo(TypeCotisation::class,'typecotisation_id');
    }

    public static function boot()
    {
        // code...
        parent::boot();

        self::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }
}
