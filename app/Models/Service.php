<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
 
     public function getRouteKeyName()
     {
         return 'id'; 
     }
}
