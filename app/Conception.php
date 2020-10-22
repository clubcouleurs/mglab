<?php

namespace App;

use App\Document;
use App\Graphiste;
use App\Image;
use App\Produit;
use App\Propal;
use App\Status;
use App\Type;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conception extends Model
{
   protected $guarded = [];

   protected $dates = [
        'lancer_at',
        'validate_at',
    ];

   public function document()
   {
      return $this->hasOne(Document::class, 'conception_id')->latest() ;
   }

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

   public function type()
   {
      return $this->belongsTo(Type::class)->latest() ;
   }

   public function produits()
   {
      return $this->hasMany(Produit::class)->latest() ;
   }

   public function images()
   {
   		return $this->hasMany(Image::class)->latest() ;
   }

   public function propals()
   {
      return $this->hasMany(Propal::class) ;
   }

   public function propalChoisie()   
   {

      return $this->propals()//->select('id')
                             ->where('user_id', $this->user_id )
                             ->whereNull('modification_id')
                             ->first() ;
   }

   public function propalModifiee($value = null)   
   {
    if (isset($value))
    {
      $rslt = $this->propals()//->select('id')
                              ->where('user_id', $this->user_id )
                              ->whereNotNull('modification_id')
                              ->orderBy('updated_at' , 'asc')->get();
      return $rslt[$value] ;                              
    }
    else
    {
      return $this->propals()//->select('id')
                             ->where('user_id', $this->user_id )
                             ->whereNotNull('modification_id')
                             ->orderBy('updated_at' , 'desc')
                             ->first();      
    }
   }   

   public function getCountModifications()
   {
      return count($this->propals()
                             ->where('user_id', $this->user_id )
                             ->whereNotNull('modification_id')
                             ->get()) ;
   }

   public function getCountModificationsRestantes()
   {
      return ($this->nombreModification - count($this->getModifications())) ;
   }

   public function getModifications()
   {
     return $this->propals->map->modification->sortByDesc('created_at')->pluck('id')->flatten()->unique()->filter()->values() ;
   }

    public function modifications()
    {
        return $this->hasManyThrough('App\Modification', 'App\Propal')->latest();
    }

   public function upgradeStatus($valeur = Null)
   {
        $this->status_id = $valeur  ;
        return $this->save() ;
   }

   public function downgradeStatus($value = null)
   {
        if (isset($value))
        {
          $this->status_id = $value  ;  
        }
        else
        {
          $this->status_id = ( $this->status_id - 1 )  ;
        }
        return $this->save() ;
   }   

   public function getParticuliersAttribute()
   {
      return ((Str::substr($this->cible,0,1) !== '0') && (Str::substr($this->cible,0,1) !== '') ? 'Particuliers' : '') ;
   }
   public function getEntreprisesAttribute()
   {
      return ((Str::substr($this->cible,2,1) !== '0') && (Str::substr($this->cible,2,1) !== '')? 'Entreprises' : '') ;
   }

   public function getSlabAttribute()
   {
      return ((Str::substr($this->font,0,2) !== '00') && (Str::substr($this->font,0,2) !== '') ? 'Slab Serif' : '') ;
   }

   public function getScriptAttribute()
   {
     return ((Str::substr($this->font,3,2) !=='00') && (Str::substr($this->font,3,2) !=='') ? 'Script' : '') ;
   }
   public function getSerifAttribute()
   {
     return ((Str::substr($this->font,12,2) !== '00') && (Str::substr($this->font,12,2) !== '') ? 'Serif' : '') ;
   }
   public function getSanserifAttribute()
   {

     return ((Str::substr($this->font,6,2) !== '00') && (Str::substr($this->font,6,2) !== '') ? 'Sans Serif' : '') ;
   }
   public function getManuscritAttribute()
   {
     return ((Str::substr($this->font,9,2) !== '00') && (Str::substr($this->font,9,2) !== '') ? 'Manuscrit' : '') ;
   }
   public function getEnfantsAttribute()
   {
     return ((Str::substr($this->age_cible,0,1) !== '0') && (Str::substr($this->age_cible,0,1) !== '') ? 'Enfants' : '') ;
   }   
   public function getAdolescentsAttribute()
   {
     return ((Str::substr($this->age_cible,2,1) !== '0') && (Str::substr($this->age_cible,2,1) !== '') ? 'Adolescents' : '') ;
   }
   public function getSenioursAttribute()
   {
     return ((Str::substr($this->age_cible,6,1) !== '0') && (Str::substr($this->age_cible,6,1) !== '') ? 'Seniours' : '') ;
   }

    public function getFemmesAttribute()
     {
      return ((Str::substr($this->sex_cible,2,1) !== '0') && (Str::substr($this->sex_cible,2,1) !== '') ? 'Femmes' : '') ;
     }

    public function getHommesAttribute($value='')
     {
      return ((Str::substr($this->sex_cible,0,1) !== '0') && (Str::substr($this->sex_cible,0,1) !== '') ? 'Hommes' : '') ;
     }

     public function getAdultesAttribute()
     {
       return ((Str::substr($this->age_cible,4,1) !== '0') && (Str::substr($this->age_cible,4,1) !== '') ? 'Adultes' : '') ;
     }

    public function getTypeConceptionAttribute()
    {
        $type  = explode(' ', strtolower($this->type));
        return $type[1] ;
    }


    public function createPdf() {
      // share data to view
      view()->share('conception', $this);
      $pdf = PDF::loadView('pdf.conception', ['conception' => $this,
      //return view('pdf.conception', ['conception' => $conception,
            'images' =>$this->images,
            'document' =>$this->document,            
            'produits' => $this->produits,
            'slab' => $this->slab,
            'SansSerif' => $this->SansSerif,
            'Serif' => $this->Serif,
            'Manuscrit' => $this->Manuscrit,
            'Script' => $this->Script,
            'Particuliers' => $this->Particuliers,
            'Entreprises' => $this->Entreprises,
            'Hommes' => $this->Hommes,
            'Femmes' => $this->Femmes,
            'Enfants' => $this->Enfants,
            'Adolescents' => $this->Adolescents,
            'Adultes' => $this->Adultes,
            'Seniours' => $this->Seniours,
            'type' => $this->typeConception,
        ]) ; 

      // download PDF file with download method
      return $pdf->download($this->type .'.pdf');
    }
   
}
