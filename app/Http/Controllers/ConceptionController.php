<?php

namespace App\Http\Controllers;
use App\Conception;
use App\Events\ConceptionValidated;
use App\Events\DataConceptionReceived;
use App\Events\GraphisteAffected;
use App\Events\ModificationValidated;
use App\Events\PropalsValidated;
use App\Graphiste;
use App\Http\Requests\StoreConception;
use App\Image;
use App\Propal;
use Carbon\Carbon;
use Corcel\Model\User;
use Gate ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ConceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {

            return view('dashboard', ['conceptions' => Conception::whereNull('updated_at')
                                                                ->orderBy('updated_at', 'desc')
                                                                ->get(),
                                          'conceptionsACreer' => Conception::whereNotNull('updated_at')
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get()
                                         ]);   

    }
    public function crea_attente()
    {

           return view('conceptions.indexAttente', ['conceptions' => Conception::whereNull('lancer_at')
                                                                ->get()
                            ]); 
    }

    public function crea_en_cours()
    {

        if (Gate::allows('soumettre_proposition') && Gate::denies('administrer')) {
            return view('conceptions.indexEnCours', ['conceptionsEnAttPropals'
                                    => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 2)
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->with('propals')
                                                                ->get(),

                                                    'conceptionsEnAttCrea'
                                    => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->whereNotNull('lancer_at')
                                                                ->whereNotNull('validate_at')
                                                                ->orderBy('validate_at', 'desc')
                                                                ->get(),
                'conceptions1' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 1 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions2' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 2 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions3' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 3 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions4' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 4 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions5' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 5 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions6' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 6 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions7' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 7 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions8' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 8 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions9' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 9 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions10' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 10 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions11' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 11 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions12' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 12 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions13' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 13 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions14' => Conception::where('graphiste_id', auth()->user()->ID)
                                                                ->where('status_id' , 14 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(), 

                                                                                                                                                                         
                                                     'graphistes' => ''
                            ]);
        }

                                                               

            return view('conceptions.indexEnCours', ['conceptions' => Conception::whereNotNull('lancer_at')
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->with('graphiste')
                                                                ->with('user')
                                                                ->get(),
                'conceptions1' => Conception::where('status_id' , 1 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions2' => Conception::where('status_id' , 2 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions3' => Conception::where('status_id' , 3 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions4' => Conception::where('status_id' , 4 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions5' => Conception::where('status_id' , 5 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                                                                         
                'conceptions6' => Conception::where('status_id' , 6 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                //->with('modifications')
                                                                ->with(['propals' => function($query){
                                                                    $query->whereNotNull('user_id')
                                                                    ->first();
                                                                }])
                                                                ->get(),
                                                              




                'conceptions7' => Conception::where('status_id' , 7 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions8' => Conception::where('status_id' , 8 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions9' => Conception::where('status_id' , 9 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions10' => Conception::where('status_id' , 10 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions11' => Conception::where('status_id' , 11 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions12' => Conception::where('status_id' , 12 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions13' => Conception::where('status_id' , 13 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions14' => Conception::where('status_id' , 14 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),
                'conceptions15' => Conception::where('status_id' , 15 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                                                            

                                                               

                'conceptionsEnAttPropals' => Conception::where('status_id' , 14 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(), // à supprimer

                'conceptionsEnAttCrea' => Conception::where('status_id' , 14 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(), // à supprimer


                                                     'graphistes' => Graphiste::with('user')->get(),
                            ]);  

    }
    public function crea_valide()
    {
            return view('conceptions.indexValidees', ['conceptions' => Conception::whereNotNull('validate_at')
                                                                ->orderBy('validate_at', 'desc')
                                                                ->with('graphiste')
                                                                ->with('user')
                                                                ->get(),
                                                     'graphistes' => Graphiste::with('user')->get(),
                            ]);  
    }    

    public function index()
    {

      
            return view('conceptions.index', 
                ['conceptions1' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 1 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions2' => Conception::where('user_id', auth()->user()->ID)
                                                                ->whereIn('status_id' , [2 , 3 , 4] )
                                                                
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions5' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 5 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions6' => Conception::where('user_id', auth()->user()->ID)
                                                                ->whereIn('status_id' , [6,7] )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),


                'conceptions8' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 8 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions9' => Conception::where('user_id', auth()->user()->ID)
                                                                ->whereIn('status_id' , [9,10] )

                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions11' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 11 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),

                'conceptions12' => Conception::where('user_id', auth()->user()->ID)
                                                                ->whereIn('status_id' , [12,13] )


                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),       

                'conceptions14' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 14 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),  

                'conceptions15' => Conception::where('user_id', auth()->user()->ID)
                                                                ->where('status_id' , 15 )
                                                                ->orderBy('lancer_at', 'desc')
                                                                ->get(),                                                                                                                                                                                       

                 'conceptions' => auth()->user()->conceptionAConfigurer(), // à supprimer 
                 'conceptionsACreer' => auth()->user()->conceptionACreer() // à supprimer
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
        if($request->has('upgrade'))
        {
            
            switch (Request('upgrade')) {
                case '0' :
                    $conception->upgradeStatus(5) ;
                    break;
                case '1' :
                ///dd("Request('upgrade')") ;
                    $conception->upgradeStatus(8) ;
                    break;
                case '2' :
                    $conception->upgradeStatus(11) ;
                    break; 
                case '3' :
                    $conception->upgradeStatus(14) ;
                    break;                                                          
                default:
                    abort(403) ;
                    break;
            }

            if ( $conception->status->id === 5 ) {
                PropalsValidated::dispatch($conception) ;
            }
            else
            {
                ModificationValidated::dispatch($conception) ;
            }
            return back() ;
        }

        if($request->has('graphiste'))
        {
            $conception->graphiste_id = Request('graphiste') ;
            $conception->save();
            $conception->upgradeStatus(3) ;

            GraphisteAffected::dispatch($conception) ;
            
            return back() ;
        }
        if($request->hasFile('pdf_conception'))
        {
            

            $pdfName = 'Exe_' . str_replace(' ', '', $conception->type) . '-' 
                              . str_replace('.', '', $conception->user->user_login) . '-' 
                              . str_replace(' ', '-', date('Y-m-d-His')) ;
            $pdfExtension = $request->file('pdf_conception')->extension() ;                 

            $pdfPath = $request->file('pdf_conception')
                                       ->storeAs('creations', $pdfName . '.' . $pdfExtension) ;

            $conception->pdf_conception = $pdfName . '.' . $pdfExtension ;
            $conception->upgradeStatus(15) ;
            $conception->save();
            ConceptionValidated::dispatch($conception) ;            
            return back() ;
        }        


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
        'status_id' => 2
       ]);
       
        DataConceptionReceived::dispatch($conception) ;
        return redirect()->route('home') ;
       

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
