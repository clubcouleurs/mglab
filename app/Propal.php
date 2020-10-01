<?php

namespace App;

use App\Conception;
use App\Modification;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Propal extends Model
{
    protected $fillable = [
        'lien', 'modification_id','user_id', 'conception_id'
    ];

    public function conception()
    {
    	return $this->belongsTo(Conception::class) ;
    }

    public function user()
    {
    	return $this->belongsTo(User::class) ;
    }

    public function modification()
    {
        return $this->hasOne(Modification::class);
    }    


}
