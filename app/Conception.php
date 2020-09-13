<?php

namespace App;

use App\Image;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Conception extends Model
{
   protected $guarded = [];

   protected $dates = [
        'lancer_at',
        'validate_at',
    ];

   public function user()
   {
   		return $this->belongsTo(User::class, 'user_id')->latest() ;
   }
   public function images()
   {
   		return $this->hasMany(Image::class)->latest() ;
   }
   
}
