<?php

namespace App;

use App\Conception;
use App\Modification;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'lien', 'nomDocument'
    ];

    public function Conception()
    {
        return $this->belongsTo(Conception::class)->latest();
    }

    public function Modification()
    {
        return $this->belongsTo(Modification::class)->latest();
    }    
}
