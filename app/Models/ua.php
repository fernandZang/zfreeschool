<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ua extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function module()
    {
        return $this->belongsTo(module::class);
    }

    public function ue()
    {
        return $this->hasMany(ue::class);
    }
}
