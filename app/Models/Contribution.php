<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        // code...
        parent::boot();

        self::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }
}
