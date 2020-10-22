<?php

namespace App;
use App\Graphiste;
use App\Image;
use App\Propal;
use App\Status;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends Model
{

    protected $guarded = [];
    protected $casts = [
		'data' => 'array',
	];

   public function user()
   {
   		return $this->belongsTo(User::class, 'notifiable_id')->latest() ;
   }

}
