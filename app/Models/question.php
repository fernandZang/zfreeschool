<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function prerequi()
    {
        return $this->belongsTo(prerequi::class);
    }

    public function situation_probleme()
    {
        return $this->belongsTo(situation_probleme::class);
    }
    public function devoir()
    {
        return $this->belongsTo(devoir::class);
    }
    public function mauvaise_reponse()
    {
        return $this->hasMany(mauvaise_reponse::class);
    }
}
