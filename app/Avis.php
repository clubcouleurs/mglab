<?php

namespace App;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
	protected $guarded = [];

   public function user()
   {
   		return $this->belongsTo(User::class, 'user_id')->latest() ;
   }

}
