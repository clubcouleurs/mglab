<?php

namespace App;

use App\Conception;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function conceptions()
    {
      return $this->hasMany(Conception::class)->latest() ;
    	
    }

    public function getLabelAttribute()
    {
    	$label = explode(' ', strtolower($this->nom));
    	unset($label[0]) ;
    	return $label = ucfirst(implode(' ', $label)) ;
    }
    public function getLabelPlurielAttribute()
    {
        $label = explode(' ', strtolower($this->nom));
        unset($label[0]) ;
        $label[1] = $label[1] . 's' ;
        return $label = ucfirst(implode(' ', $label)) ;
    }    
}
