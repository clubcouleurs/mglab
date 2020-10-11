<?php

namespace App;

use App\Conception;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'description', 'image', 'prix', 'NomOriginalImage'
    ];

    public function Conception()
    {
        return $this->belongsTo(Conception::class)->latest();
    }
}
