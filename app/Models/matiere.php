<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matiere extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function enseignants()
    {
        return $this->hasMany(enseignants::class);
    }

    public function niveau_matiere()
    {
        return $this->hasMany(niveau_matiere::class);
    }

}
