<?php

namespace App\Http\Controllers;

use App\Conception;
use App\Events\ModificationApplied;
use App\Events\PropalsCreated;
use App\Modification;
use App\Propal;
use Corcel\Model\User;
use Illuminate\Http\Request;

class PropalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conception $conception)
    {
        //return view('propositions.index', ['propositions' => $conception->propals]) ;
        return view('propositions.index', ['propositions' => $conception->propals()
                                                                    ->orderBy('id', 'asc')
                                                                    ->take(3)
                                                                    ->get(),
                                            'conception' => $conception]) ;        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Conception $conception)
    {
       if($request->hasFile('propals')) {

            $conception->modifications()->delete();
            $conception->propals()->delete();


            $i = 0 ;
            foreach($request->file('propals') as $propal) {
            $i += 1 ;

            $propalName = 'Proposition_' . $i . '_' . str_replace(' ', '', $conception->type) . '-' 
                                     . str_replace(' ', '-', date('Y-m-d-His')) ;

            $propalExtension = $propal->extension() ;                 

            $propalPath = $propal->storeAs('propals', $propalName . '.' . $propalExtension) ;

            $propalNameExtension = $propalName . '.' . $propalExtension ;

                $propalConception = new Propal([
                    'lien' => $propalNameExtension,

                ]);            
                $conception->propals()->save($propalConception);
            }

            $conception->upgradeStatus(4) ;
            PropalsCreated::dispatch($conception) ;
            return back()->with('message','Propositions envoyées !') ; ;
        } 
    }

    /**
     * Store a newly created proposal after modification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeAsPropalAfterModification(Request $request, Conception $conception,
                                                        Modification $Modification)
    {
       if($request->hasFile('modif')) {

                   
            $i = $conception->getCountModifications() + 1 ;


            $propal = $request->file('modif') ;
            

            $propalName = 'Modification_' . $i . '_' . str_replace(' ', '', $conception->type) . '-' 
                                     . str_replace(' ', '-', date('Y-m-d-His')) ;

            $propalExtension = $propal->extension() ;                 

            $propalPath = $propal->storeAs('propals', $propalName . '.' . $propalExtension) ;

            $propalNameExtension = $propalName . '.' . $propalExtension ;

                $propalConception = new Propal([
                    'lien' => $propalNameExtension,
                    'modification_id' => $Modification->id,
                    'user_id' => $conception->user_id,
                ]);
                $conception->propals()->save($propalConception);
                //dd($conception->getCountModifications()) ;
                switch ($conception->getCountModifications()) {
                    case 1:
                        $upgrade = 7 ;
                        break;
                    case 2:
                        $upgrade = 10 ;
                        break;
                    case 3:
                        $upgrade = 13 ;
                        break;                                                
                    
                    default:
                        dd('Problème avec l\'upgrade system niveau PropalController@storeAsPropalAfterModification');
                        break;
                }

                $conception->upgradeStatus($upgrade) ;
                
                ModificationApplied::dispatch($conception);
                
            return back() ;
        } 
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Propal  $propal
     * @return \Illuminate\Http\Response
     */
    public function show(Propal $propal)
    {   

        return view('propositions.show', ['proposition' => $propal , 
                                        'modifications' => $propal->modification()
                                        ]) ;  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propal  $propal
     * @return \Illuminate\Http\Response
     */
    public function edit(Propal $propal)
    {
        return view('propositions.edit', ['proposition' => $propal]) ;  
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propal  $propal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conception $conception, Propal $propal)
    {
        /*$propalExistant = $conception->propals()->whereNotNull('user_id')->first() ;
        if ($propalExistant)
        {
            $propalExistant->user_id = NULL ;
            $propalExistant->save(); 
        }

            $propal->user_id = $conception->user_id ; //auth()->user()->ID ;
            $propal->save();
            
            return redirect('/propositions/' . $propal->id ) ;
            //return back() ;   */         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propal  $propal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propal $propal)
    {
        //
    }
}
