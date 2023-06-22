<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devoir extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function question()
    {
        return $this->hasMany(question::class);
    }
    
    public function cour()
    {
        return $this->belongsTo(cour::class);
    }
}
