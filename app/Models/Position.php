<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        // Add more fields as needed
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
