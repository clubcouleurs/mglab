<?php

namespace App\Http\Controllers;

use App\Conception;
use App\Http\Requests\StoreConception;
use App\Image;
//use App\User as Utilisateur;
use Carbon\Carbon;
use Corcel\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ConceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
        return view('conceptions.index', ['conceptions' => auth()->user()->conceptionAConfigurer(),
                                          'conceptionsACreer' => auth()->user()->conceptionACreer()
                                         ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConception $request)
    {





        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Conception $conception)
    {
        $slab = (Str::substr($conception->font,0,2) !== '00' ? 'Slab Serif' : '') ;
        $SansSerif = (Str::substr($conception->font,3,2) !=='00' ? 'Script' : '') ;
        $Serif = (Str::substr($conception->font,6,2) !== '00' ? 'Sans Serif' : '') ;
        $Manuscrit = (Str::substr($conception->font,9,2) !== '00' ? 'Manuscrit' : '') ;
        $Script = (Str::substr($conception->font,12,2) !== '00' ? 'Serif' : '') ;

        $Particuliers = (Str::substr($conception->cible,0,1) !== '0' ? 'Particuliers' : '') ;
        $Entreprises = (Str::substr($conception->cible,2,1) !== '0' ? 'Entreprises' : '') ;

        $Hommes = (Str::substr($conception->sex_cible,0,1) !== '0' ? 'Hommes' : '') ;
        $Femmes = (Str::substr($conception->sex_cible,2,1) !== '0' ? 'Femmes' : '') ;

        $Enfants = (Str::substr($conception->age_cible,0,1) !== '0' ? 'Enfants' : '') ;
        $Adolescents = (Str::substr($conception->age_cible,2,1) !== '0' ? 'Adolescents' : '') ;
        $Adultes = (Str::substr($conception->age_cible,4,1) !== '0' ? 'Adultes' : '') ;
        $Seniours = (Str::substr($conception->age_cible,6,1) !== '0' ? 'Seniours' : '') ;

                  

        
        return view('conceptions.show', ['conception' => $conception,
                                        'images' =>$conception->images,
                                        'slab' => $slab,
                                        'SansSerif' => $SansSerif,
                                        'Serif' => $Serif,
                                        'Manuscrit' => $Manuscrit,
                                        'Script' => $Script,
                                        'Particuliers' => $Particuliers,
                                        'Entreprises' => $Entreprises,
                                        'Hommes' => $Hommes,
                                        'Femmes' => $Femmes,
                                        'Enfants' => $Enfants,
                                        'Adolescents' => $Adolescents,
                                        'Adultes' => $Adultes,
                                        'Seniours' => $Seniours
                                         ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conception $conception)
    {
        return view('form', ['conception' => $conception ]) ;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConception $request, Conception $conception)
    {


        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $destinationPath = $image->store('uploads') ;
                //$destinationPath = 'uploads/';
                //dd($image->getClientOriginalName()) ;
                $filename = $image->getClientOriginalName();
                

                $imageConception = new Image([
                    'lien' => $destinationPath,
                    'nomFichier' => $filename
                ]);

                $conception->images()->save($imageConception);
            }
        }

        //$images = request('photos')->store('uploads');


        //$validated = $request->validated();

        $sex_cible =            ($request->has('Hommes') ? Str::substr(Request('Hommes'), 0, 1) : '0')  
                        . '|' . ($request->has('Femmes') ? Str::substr(Request('Femmes'), 0, 1) : '0');

        $age_cible =            ($request->has('Enfants') ? Str::substr(Request('Enfants'), 0, 1) : '0')
                        . '|' . ($request->has('Adolescents') ? Str::substr(Request('Adolescents'), 0, 1) : '0')
                        . '|' . ($request->has('Adultes') ? Str::substr(Request('Adultes'), 0, 1) : '0')
                        . '|' . ($request->has('Seniours') ? Str::substr(Request('Seniours'), 0, 1) : '0');

        $cible =                ($request->has('cible_b2c') ? Str::substr(Request('cible_b2c'), 0, 1) : '0')
                        . '|' . ($request->has('cible_b2b') ? Str::substr(Request('cible_b2b'), 0, 1) : '0');

        $font =            ($request->has('Slab') ? Str::substr(Request('Slab'), 0, 2) : '00')
                        . '|' . ($request->has('Script') ? Str::substr(Request('Script'), 0, 2):'00')
                        . '|' . ($request->has('SansSerif') ? Str::substr(Request('SansSerif'), 0, 2) : '00')
                        . '|' . ($request->has('Manuscrit') ? Str::substr(Request('Manuscrit'), 0, 2) : '00')
                        . '|' . ($request->has('Serif') ? Str::substr(Request('Serif'), 0, 2) : '00');

        $logo = $request->file('logo')->store('uploads');

        

       $rslt = $conception->update([
        'logo' => $logo,
        'slogan' => $request['slogan'],
        'activities' => $request['activities'],
        'positionnement' => $request['positionnement'],
        'contacts' => $request['contacts'],
        'texte_additionnel' => $request['texte_additionnel'],
        'rs_entreprise' => $request['rs_entreprise'],
        'activities_cible' => $request['activities_cible'],
        'couleur_1' => $request['couleur_1'],
        'couleur_2' => $request['couleur_2'],
        'couleur_3' => $request['couleur_3'],
        'style' => $request['style'],
        'sex_cible' => $sex_cible,
        'age_cible' => $age_cible,
        'cible'  => $cible,
        'font' => $font,
        'lancer_at' => date('Y-m-d H:i:s'),

       ]);
       

       return redirect()->route('conceptions') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
