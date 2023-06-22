<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function matiere()
    {
        return $this->belongsTo(matiere::class);
    }

    public function niveau()
    {
        return $this->hasMany(niveau::class);
    }
}
