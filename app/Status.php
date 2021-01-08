<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Status extends Model
{
    public function getXlabelAttribute()
    {
        return Str::upper($this->label);
    } 
}
