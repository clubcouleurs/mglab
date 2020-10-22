<?php

namespace App;

use App\Propal;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    
        protected $fillable = [
        'explication'
    ];

    public function propal()
    {
        return $this->belongsTo(Propal::class)->latest();
    }  

   public function document()
   {
      return $this->hasMany(Document::class, 'modification_id')->latest() ;
   }
}
