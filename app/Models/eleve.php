<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
    use HasFactory;
    protected $guarded = []; 


    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function classe()
    {
        return $this->belongsTo(classe::class);
    }

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(enseignant::class);
    }
}
