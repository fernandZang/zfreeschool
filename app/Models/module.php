<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function projet_pedagogique()
    {
        return $this->belongsTo(projet_pedagogique::class);
    }

    public function ua()
    {
        return $this->hasMany(ua::class);
    }
}
