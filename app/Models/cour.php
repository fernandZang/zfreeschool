<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cour extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function prerequi()
    {
        return $this->hasOne(prerequi::class);
    }
    public function situation_probleme()
    {
        return $this->hasOne(situation_probleme::class);
    }
    public function devoir()
    {
        return $this->hasOne(devoir::class);
    }
    public function ue()
    {
        return $this->belongsTo(ue::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(enseignant::class);
    }
}
