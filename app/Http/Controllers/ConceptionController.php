<?php

namespace App\Http\Controllers;
use App\Conception;
use App\Document;
use App\Events\ConceptionValidated;
use App\Events\ConceptionValidatedPdfRequired;
use App\Events\DataConceptionReceived;
use App\Events\GraphisteAffected;
use App\Events\ModificationValidated;
use App\Events\PropalsValidated;
use App\Graphiste;
use App\Http\Requests\StoreConception;
use App\Http\Traits\ImageWidthHeight;
use App\Http\Traits\RowToColTrait ;
use App\Image;
use App\Produit;
use App\Propal;
use App\Type;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Corcel\Model\User;
use Gate ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageIntervention;

class ConceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use RowToColTrait ;
    use ImageWidthHeight ;

    public function dashboard()
    {
        $now = Carbon::now();
        $expDate = $now->subDays(30);
        $year = $now->year;

        return view('dashboard',[
            'conceptions' => count(Conception::where('status_id' , 1)->get()),
            'conceptionsACreer' => count(Conception::where('status_id' , 2)->get()),
            'CAMois' =>Conception::whereDate('created_at', '>=', $expDate)->sum('prix'),
            'CAAnne' =>Conception::whereYear('created_at', '=', $year)->sum('prix'),

        ]);   



    }


    /*public function crea_en_cours()
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

    }*/




// les conceptions en attente de données step 1
    public function WaitingForData()
    {
        return view('conceptions.indexWaitingForData', [
            'conceptions' => Conception::where('status_id' , 1 )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10)                             
        ]);  
    }
// fin les conceptions en attente de données 

// les conceptions en attente afectation graphiste step 2
    public function WaitingForGraphiste()
    {
        return view('conceptions.indexWaitingForGraphiste', [
            'conceptions' => Conception::where('status_id' , 2 )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10),

        'graphistes' => Graphiste::with('user')->get(),            
        ]);  
    }
// fin les conceptions en attente afectation graphiste
// les conceptions en attente de création step 3
    public function WaitingForCreation()
    {
        
        if (Gate::allows('soumettre_proposition') && Gate::denies('administrer')) {
            return view('conceptions.indexWaitingForCreation', [
                'conceptions' => Conception::where('graphiste_id', auth()->user()->graphiste->id)
                ->where('status_id' , 3 )
                ->orderBy('lancer_at', 'desc')
                ->paginate(10)
            ]);
        }
        if (Gate::allows('administrer')) {
            return view('conceptions.indexWaitingForCreation', [
                'conceptions' => Conception::where('status_id' , 3 )
                ->orderBy('lancer_at', 'desc')
                ->paginate(10)
            ]);  
        }        


    }
// fin les conceptions en attente de création 

// les conceptions en attente validation Manager step 4/7/10/13
    public function WaitingForValidation()
    {
        return view('conceptions.indexWaitingForValidation', [
            'conceptions' => Conception::whereIn('status_id' , [4,7,10,13] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10)
        ]);  
    }
// fin les conceptions en attente validation Manager


// les conceptions en attente modification step 6/9/12/14
    public function WaitingForModification()
    {
        if (Gate::allows('soumettre_proposition') && Gate::denies('administrer')) {
        return view('conceptions.indexWaitingForModification', [
            'conceptions' => Conception::where('graphiste_id', auth()->user()->graphiste->id)
            ->whereIn('status_id' , [6,9,12] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10)
        ]);
        }
        if (Gate::allows('administrer')) {
        return view('conceptions.indexWaitingForModification', [
            'conceptions' => Conception::whereIn('status_id' , [6,9,12] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10)
        ]);
        }
    }
// fin les conceptions en attente modification

// les conceptions en attente réponse client step 5/8/11/14
    public function WaitingForClient()
    {
        return view('conceptions.indexWaitingForClient', [
            'conceptions' => Conception::whereIn('status_id' , [5,8,11] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10)                                  
        ]);

    }
// fin les conceptions en attente réponse client

// les conceptions en attente fichier pdf step 14
    public function WaitingForPDF()
    {
        if (Gate::allows('soumettre_proposition') && Gate::denies('administrer')) {
        return view('conceptions.indexWaitingForPDF', [
            'conceptions' => Conception::where('graphiste_id', auth()->user()->graphiste->id)
            ->whereIn('status_id' , [14] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10),
        ]);
        }
        if (Gate::allows('administrer')) {
        return view('conceptions.indexWaitingForPDF', [
            'conceptions' => Conception::whereIn('status_id' , [14] )
            ->orderBy('lancer_at', 'desc')
            ->paginate(10),
        ]);
        }
    }
// fin les conceptions en attente fichier pdf


// les conceptions en cours de création step 15
    public function conceptionEnding()
    {
        if (Gate::allows('soumettre_proposition') && Gate::denies('administrer')) {        
            return view('conceptions.indexConceptionEnding', [
                'conceptions' => Conception::where('graphiste_id', auth()->user()->graphiste->id)
                ->where('status_id' , 15 )
                ->orderBy('lancer_at', 'desc')
                ->paginate(10)
            ]);
        }
        if (Gate::allows('administrer')) {        
            return view('conceptions.indexConceptionEnding', [
                'conceptions' => Conception::where('status_id' , 15 )
                ->orderBy('lancer_at', 'desc')
                ->paginate(10)
            ]);
        }        

    }
// fin les conceptions en cours de création


    public function index()
    {

        //dd($expDate) ;
        return view('conceptions.index', 
            ['conceptions1' => Conception::where('user_id', auth()->user()->ID)
            ->where('status_id' , 1 )
            ->orderBy('lancer_at', 'desc')
            ->get(),

            'conceptions234' => Conception::where('user_id', auth()->user()->ID)
            ->whereIn('status_id' , [2 , 3 , 4] )

            ->orderBy('lancer_at', 'desc')
            ->get(),

            'conceptions5811' => Conception::where('user_id', auth()->user()->ID)
            ->whereIn('status_id' , [5,8,11] )
            ->orderBy('lancer_at', 'desc')
            ->get(),

            'conceptions691271013' => Conception::where('user_id', auth()->user()->ID)
            ->whereIn('status_id' , [6,9,12,7,10,13] )
            ->orderBy('lancer_at', 'desc')
            ->get(),
            'conceptions14' => Conception::where('user_id', auth()->user()->ID)
            ->whereIn('status_id' , [14] )
            ->orderBy('lancer_at', 'desc')
            ->get(),                   

            'conceptions15' => auth()->user()->ConceptionAvantArchive(), 
            'types' => Type::all(), 

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Conception $conception)
    {

        return view('conceptions.show', ['conception' => $conception,
            'images' =>$conception->images,
            'produits' => $conception->produits,
            'document' =>$conception->document,            
            'slab' => $conception->slab,
            'SansSerif' => $conception->sanserif,
            'Serif' => $conception->serif,
            'Manuscrit' => $conception->manuscrit,
            'Script' => $conception->script,
            'Particuliers' => $conception->particuliers,
            'Entreprises' => $conception->entreprises,
            'Hommes' => $conception->hommes,
            'Femmes' => $conception->femmes,
            'Enfants' => $conception->enfants,
            'Adolescents' => $conception->adolescents,
            'Adultes' => $conception->adultes,
            'Seniours' => $conception->seniours,
            'type' => $conception->typeConception,
            'confirm' => '',
            'types' => Type::all(), 

        ]) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Conception $conception)
    {
        return view('conceptions.show', ['conception' => $conception,
            'images' =>$conception->images,
            'produits' => $conception->produits,
            'document' =>$conception->document,            
            'slab' => $conception->slab,
            'SansSerif' => $conception->sanserif,
            'Serif' => $conception->serif,
            'Manuscrit' => $conception->manuscrit,
            'Script' => $conception->script,
            'Particuliers' => $conception->particuliers,
            'Entreprises' => $conception->entreprises,
            'Hommes' => $conception->hommes,
            'Femmes' => $conception->femmes,
            'Enfants' => $conception->enfants,
            'Adolescents' => $conception->adolescents,
            'Adultes' => $conception->adultes,
            'Seniours' => $conception->seniours,
            'type' => $conception->typeConception,
            'types' => Type::all(), 
        ]) ;
    }

    public function canEditConception(Conception $conception)
    {
        return $conception->status_id === 1 ? true : false ;
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conception $conception)
    {
        if($this->canEditConception($conception))
        {
            return view('conceptions.edit', ['conception' => $conception,
                'images' =>$conception->images,
                'produits' => $conception->produits,
                'document' =>$conception->document,            
                'slab' => $conception->slab,
                'SansSerif' => $conception->sanserif,
                'Serif' => $conception->serif,
                'Manuscrit' => $conception->manuscrit,
                'Script' => $conception->script,
                'Particuliers' => $conception->particuliers,
                'Entreprises' => $conception->entreprises,
                'Hommes' => $conception->hommes,
                'Femmes' => $conception->femmes,
                'Enfants' => $conception->enfants,
                'Adolescents' => $conception->adolescents,
                'Adultes' => $conception->adultes,
                'Seniours' => $conception->seniours,
                'type' => $conception->typeConception,
                'types' => Type::all(), 

            ]) ; 
        }
        else
        {
            return view('conceptions.deny', [
                'conception' => $conception,
                'types' => Type::all(), 
            ]) ;
        }               
        
    }

    /**
     * Downgrade a conception from a level to a lower level.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downgrade(Request $request, Conception $conception)
    {

        //dd('') ;
            switch ($conception->status_id)
            {
                case 15 :
                    Storage::delete('creations/' . $conception->pdf_conception);
                    $conception->pdf_conception = Null;
                    $conception->save() ;
                    $conception->downgradeStatus() ;
                    break;

                case 14 :
                    switch (count($conception->modifications)) 
                    {
                        case 0 :
                            $conception->downgradeStatus(4) ;
                            break;
                        case 1 :
                            $conception->downgradeStatus(7) ;
                            break;
                        case 2 :
                            $conception->downgradeStatus(10) ;
                            break;    
                        case 3 :
                            $conception->downgradeStatus(13) ;
                            break;
                    }
                            break;

                case 11 :
                    switch (count($conception->modifications)) 
                    {
                        case 0 :
                            $conception->downgradeStatus(4) ;
                            break;
                        case 1 :
                            $conception->downgradeStatus(7) ;
                            break;
                        case 2 :
                            $conception->downgradeStatus(10) ;
                            break;    
                    }             
                            break;

                case 8  :
                    switch (count($conception->modifications)) 
                    {
                        case 0 :
                            $conception->downgradeStatus(4) ;
                            break;
                        case 1 :
                            $conception->downgradeStatus(7) ;
                            break;   
                    } 
                            break;

                case 5  :
                    switch (count($conception->modifications)) 
                    {
                        case 0 :
                            $conception->downgradeStatus(4) ;
                            break;   
                    }
                            break;   


                case 13 :
                case 10 :
                case 7  :
                if ($conception->propalModifiee() !== null)
                {   
                    $propal = $conception->propalModifiee() ;
                    Storage::delete('propals/' . $propal->lien);
                    $conception->propals()->where('id', $propal->id)->delete();    
                    $conception->downgradeStatus() ;
                }
                else
                {
                    $propal = $conception->propalChoisie() ;
                    $propal->user_id = null ; 
                    $propal->save();                    
                    $conception->downgradeStatus(5) ;
                }

                    break;

                case 12 :
                case 9  :
                if ($conception->modifications() !== null)
                {   
                    $modif = $conception->modifications()->first() ;   
                    $conception->modifications()->where('modifications.id', $modif->id)->delete(); 
                    $conception->downgradeStatus() ;
                }                    
                    break;

                case 6  :
                    if ($conception->modifications() !== null)
                    {   
                        $modif = $conception->modifications()->first() ;   
                        $conception->modifications()->where('modifications.id', $modif->id)->delete(); 
                    }                
                    $propal = $conception->propalChoisie() ; 
                    $propal->user_id = null ; 
                    $propal->save();
                    $conception->downgradeStatus() ;                
                    break;

                case 4  :
                foreach ($conception->propals()->get() as $propal) {
                    Storage::delete('propals/' . $propal->lien);
                }
                    $conception->propals()->delete() ; 
                    $conception->downgradeStatus() ;                
                    break; 

                case 3  :
                    $conception->graphiste_id = Null;
                    $conception->save() ;
                    $conception->downgradeStatus() ;                
                    break;   

                case 2  :  
                    $conception->status_id = 1 ;
                    $conception->lancer_at = null ;
                    $conception->save();
                    break ;

            }

            return redirect('/')->with('message','Conception downgradée !') ;

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

        if ($request->has('confirm') && $conception->updated_at !== Null) {
            $conception->status_id = 2 ;
            $conception->lancer_at = date('Y-m-d H:i:s') ;
            $conception->save();
            DataConceptionReceived::dispatch($conception) ;
            return redirect('/')->with('message','Vos données sont bien envoyées !')  ;
        }

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
                return back()->with('message','Proposition(s) validée(s) !') ;
            }
            else
            {
                if ($conception->status->id === 14) {

                    ConceptionValidatedPdfRequired::dispatch($conception) ;
                    return back()->with('message','Conception validée !') ;  
                }
                else
                {
                    ModificationValidated::dispatch($conception) ;
                    return back()->with('message','Modification validée !') ;                    
                }

            }
        }

        if($request->has('graphiste'))
        {
            $conception->graphiste_id = Request('graphiste') ;
            $conception->save();
            $conception->upgradeStatus(3) ;
            GraphisteAffected::dispatch($conception) ;
            return back()->with('message','Graphiste bien affecté !') ;
        }

        if($request->has('lancer'))
        {
            $conception->update(['lancer_at' => date('Y-m-d H:i:s')]) ;
            DataConceptionReceived::dispatch($conception) ;
            return back()->with('message','Données bien reçues !') ;
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
            $conception->validate_at = date('Y-m-d H:i:s') ;
            $conception->save();
            ConceptionValidated::dispatch($conception) ;            
            return back()->with('message','Conception validée et finalisée !') ;
        }        

            // si on a des images à supprimer

        if($request->has('imagesToDelete')) {
            $arrayElementToimagesToDelate = implode('', $request['imagesToDelete']);
            $imagesToDelete = explode(',', $arrayElementToimagesToDelate);

            foreach($imagesToDelete as $image) {
                $conception->images()->where('id',$image)->delete();

            }
        }

        // suppression des produits que le client veut supprimer
        if($request->has('produitsToDelete')) {
            $arrayElementToproduitsToDelate = implode('', $request['produitsToDelete']);
            $produitsToDelete = explode(',', $arrayElementToproduitsToDelate);
            foreach($produitsToDelete as $produit) {
                $conception->produits()->where('id',$produit)->delete();

            }
        }

        if ($request->has(['h'])) {

            $array = array($request['h'] , $request['d'], $request['p']) ;
            $array = $this->rowToCol($array) ;
            //dd($array) ;

                $filtered = array_values(array_filter($array, function($array) use ($produitsToDelete){
                    return !in_array($array[0], $produitsToDelete);
                }));

            for ($i=0; $i < count($filtered); $i++) { 
                $produit_id = intval($filtered[$i][0]) ;

                $produit = $conception->produits()->get()->first(function ($item) use ($produit_id) {
                    return $item->id === $produit_id ;
                    });
                    $produit->description = $filtered[$i][1] ;
                    $produit->prix = $filtered[$i][2] * 100 ;
                    $produit->save() ;

            }
            
        }



        // Ajout des produits pour la conception
        if($request->has('d0')) {

            $i = 0 ;
            while ( $request->has('i' . $i)) {            

                    $request->validate([
                        'd'.$i => ['sometimes','required', 'string'],
                        'i'.$i => ['image','mimetypes:image/png,image/jpeg','max:5000'],
                        'p'.$i => 'numeric'
                    ],
                    $messages = [

            'i'.$i .'.mimetypes' => 'Les fichiers doivent être des images du format : JPG ou PNG',
            'i'.$i .'.image'     => 'Les fichiers doivent être des images du format : JPG ou PNG',
            'i'.$i .'.required'  => 'Une image du produit est réquise',
            'i'.$i .'.max'       => 'Les images ne doivent pas dépasser 5 Mo',

            'd'.$i .'.string'    => 'Du texte est attendu sur ce champs',
            'd'.$i .'.required'  => 'Merci de saisir une description de produits',

            'p'.$i .'.numeric'   => 'Merci de saisir un prix valable',


                        ]

                );

            if ($request->hasFile('i'. $i ))
            {  
                $image = $request->file('i'. $i ) ;
                $destinationPath = $image->store('produits') ;
                $path = substr($destinationPath, 8 );
                $resize = ImageIntervention::make(storage_path('app/public/produits/' . $path))->encode('jpg');

                $resize->resize($this->getNewWidth($resize->width(), $resize->height(), 200) , $this->getNewHeight($resize->width(), $resize->height(), 200) , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
                    });
                    $resize->save('storage/thumbs/'. $path);                

            }else
            {
                $destinationPath = Null;
            }
                

                $filename = $image->getClientOriginalName();

                $produitConception = new Produit([
                           'image' => $destinationPath,
                           'description' => $request['d'. $i ],
                           'prix' => doubleval($request['p'. $i ]) * 100 ,
                           'NomOriginalImage' => $destinationPath 
                ]);

                $conception->produits()->save($produitConception);
                $i += 1 ;
            }            
        }

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {

            $destinationPath = $image->store('uploads') ;
            $path = substr($destinationPath, 8 );
            $resize = ImageIntervention::make(storage_path('app/public/uploads/' . $path))->encode('jpg');
            $resize->resize($this->getNewWidth($resize->width(), $resize->height(), 200), $this->getNewHeight($resize->width(), $resize->height(), 200) ,function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $resize->save('storage/thumbs/'. $path);


                $filename = $image->getClientOriginalName();
                $imageConception = new Image([
                    'lien' => $destinationPath,
                    'nomFichier' => $filename
                ]);
                $conception->images()->save($imageConception);
            }
        }

        if ($request->has('rs_entreprise'))
        {
        $sex_cible = ($request->has('Hommes') ? Str::substr(Request('Hommes'), 0, 1) : '0')  
        . '|' . ($request->has('Femmes') ? Str::substr(Request('Femmes'), 0, 1) : '0');

        $cible = ($request->has('cible_b2c') ? Str::substr(Request('cible_b2c'), 0, 1) : '0')
        . '|' . ($request->has('cible_b2b') ? Str::substr(Request('cible_b2b'), 0, 1) : '0');

        if ($request->has('cible_b2c') && Request('cible_b2c') == 'Particuliers')
        {
            $age_cible = ($request->has('Enfants') ? Str::substr(Request('Enfants'), 0, 1) : '0')
            . '|' . ($request->has('Adolescents') ? Str::substr(Request('Adolescents'), 0, 1) : '0')
            . '|' . ($request->has('Adultes') ? Str::substr(Request('Adultes'), 0, 1) : '0')
            . '|' . ($request->has('Seniours') ? Str::substr(Request('Seniours'), 0, 1) : '0');        
                   
        }
        else
        {
            $age_cible = '0|0|0|0' ;
        }

        $font = ($request->has('Slab') ? Str::substr(Request('Slab'), 0, 2) : '00')
        . '|' . ($request->has('Script') ? Str::substr(Request('Script'), 0, 2):'00')
        . '|' . ($request->has('SansSerif') ? Str::substr(Request('SansSerif'), 0, 2) : '00')
        . '|' . ($request->has('Manuscrit') ? Str::substr(Request('Manuscrit'), 0, 2) : '00')
        . '|' . ($request->has('Serif') ? Str::substr(Request('Serif'), 0, 2) : '00');


        if ($request->has('logo'))
        {
                $validatedData = $request->validate([
                    'logo' => 'required|file',
            ]);

            $logo = $request->file('logo')->store('uploads');

        }else
        {
            $logo = $conception->logo;
        }



        if($request->has('docToDelete'))
        {
            if ($request['docToDelete'] == "true" ) {
                $conception->document()->delete();
            }
        }

        if($request->hasFile('document'))
        {
                $document = $request['document'] ;
                $destinationPath = $document->store('docs') ;
                $filename = $document->getClientOriginalName();
                $documentConception = new Document([
                    'lien' => $destinationPath,
                    'nomDocument' => $filename
                ]);
                $conception->document()->save($documentConception);
        }

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
            'note' => $request['note'],
            'produitService' => $request['produitService'],
            'ageEntreprise' => $request['ageEntreprise'],
            'axeDeveloppement' => $request['axeDeveloppement'],
            'typeLogo' => $request['typeLogo'],
            'sex_cible' => $sex_cible,
            'age_cible' => $age_cible,
            'cible'  => $cible,
            'font' => $font,
            'objectif' => $request['objectif'],
        ]);

        return redirect('/conceptions/' . $conception->id . '/confirm' ) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Conception $conception)
    {
            /*if ($request->has('deleteLogo'))
            {
                $conception->logo = Null ;
                $conception->save();
                return back() ;
            }*/
    }

    public function createPDF(Conception $conception)
    {
        return $conception->createPdf();
    }    
}
