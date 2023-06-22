<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet_pedagogique extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function niveau_matiere()
    {
        return $this->belongsTo(niveau_matiere::class);
    }

    public function module()
    {
        return $this->hasMany(module::class);
    }
}
