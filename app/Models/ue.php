<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ue extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function ua()
    {
        return $this->belongsTo(ua::class);
    }
    public function cour()
    {
        return $this->hasMany(cour::class);
    }
}
