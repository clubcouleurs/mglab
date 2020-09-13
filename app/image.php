<?php

namespace App;

use App\Conception;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'description', 'lien', 'nomFichier'
    ];

    public function Conception()
    {
        return $this->belongsTo(Conception::class)->latest();
    }    
}
