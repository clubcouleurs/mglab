<?php

namespace App;

use App\Graphiste;
use App\Image;
use App\Propal;
use App\Status;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Conception extends Model
{
   protected $guarded = [];

   protected $dates = [
        'lancer_at',
        'validate_at',
    ];

   public function user()
   {
   		return $this->belongsTo(User::class, 'user_id')->latest() ;
   }

   public function graphiste()
   {
      return $this->belongsTo(Graphiste::class, 'graphiste_id')->latest() ;
   }

   public function status()
   {
      return $this->belongsTo(Status::class)->latest() ;
   }

   public function images()
   {
   		return $this->hasMany(Image::class)->latest() ;
   }

   public function propals()
   {
      return $this->hasMany(Propal::class)->latest() ;
   }

   public function propalChoisie()   
   {

      return $this->propals()->select('id')
                             ->where('user_id', $this->user_id )
                             ->whereNull('modification_id')
                             ->first() ;
   }

   public function propalModifiee()   
   {
      return $this->propals()->select('id')
                             ->where('user_id', $this->user_id )
                             ->whereNotNull('modification_id')
                             ->orderBy('created_at' , 'desc')
                             ->first() ;
   }   

   public function getCountModifications()
   {
      $modifications = $this->propals()->select('id')
                             ->where('user_id', $this->user_id )
                             ->whereNotNull('modification_id')
                             ->get() ; 

    $CountModifications = count($modifications) ;

     return $CountModifications;
   }

   public function getModifications()
   {
     return $this->propals->map->modification->pluck('id')->flatten()->unique()->filter() ;
   }

    public function modifications()
    {
        return $this->hasManyThrough('App\Modification', 'App\Propal')->latest();
    }

   public function upgradeStatus($valeur = Null)
   {
    //if (isset($valeur)) {
        $this->status_id = $valeur  ;

     //}
     //else
     //{
       // $this->status_id += 1 ;
     //}

        return $this->save() ;
   }
   
}
