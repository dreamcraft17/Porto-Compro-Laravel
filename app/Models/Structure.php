<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable =[
        'image','detail'
     ];

     public function user()
     {
        return $this->belongsTo(User::class);
     }

     public function getRouteKeyName()
     {
        return 'id';
     }
}
