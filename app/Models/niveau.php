<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function enseignant()
    {
        return $this->belongsTo(enseignant::class);
    }

    public function eleve()
    {
        return $this->hasMany(eleve::class);
    }

    public function niveau_matiere()
    {
        return $this->hasMany(niveau_matiere::class);
    }
}
