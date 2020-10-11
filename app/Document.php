<?php

namespace App;

use App\Conception;
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
}
