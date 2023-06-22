<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau_matiere extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }

    public function matiere()
    {
        return $this->belongsTo(matiere::class);
    }

    public function projet_pedagogique()
    {
        return $this->hasOne(projet_pedagogique::class);
    }
}
