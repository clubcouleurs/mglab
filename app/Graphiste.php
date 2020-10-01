<?php

namespace App;

use App\Conception;
use App\Propal;
use App\User;
use Illuminate\Database\Eloquent\Model;


class Graphiste extends Model
{
    protected $guarded = [];

    public function conceptions()
    {
        return $this->hasMany(Conception::class , 'graphiste_id')->latest();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->latest();
    }


}
