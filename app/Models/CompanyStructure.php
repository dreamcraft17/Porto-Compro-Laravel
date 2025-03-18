<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo'
        
        
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}
