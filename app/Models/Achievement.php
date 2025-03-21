<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable=[
        'name',
        'detail',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKey()
    {
        return 'id';
    }
}
