<?php

namespace App\Http\Controllers;

use App\Avis;
use App\Events\AvisCreated;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, User $user)
    {
            $avis = new Avis();
            $avis->first_name_client = $request['first_name_client'] ;
            $user->avis()->save($avis);
            AvisCreated::dispatch($avis) ;
            return back()->with('message','Sondage créé et envoyé !') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Avis $avis)
    {
        return view('avis.show', ['avis' => $avis,
                    'client' => ($avis->first_name_client != Null) ? $avis->first_name_client : $avis->user->getFirstNameClient(),
                    'types' => Type::all(), 
                ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Avis $avis)
    {
        return view('avis.edit', ['avis' => $avis,
                                'client' => ($avis->first_name_client != Null) ? $avis->first_name_client : $avis->user->getFirstNameClient(),
                            ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avis $avis)
    {
                $validatedData = $request->validate([
                    'quality_prestation' => 'integer',
                    'delai_livraison' => 'integer',
                    'quality_sav' => 'integer',
                    'quality_site' => 'integer',
                    'understand_demande' => 'integer',
                    'services_needs' => 'integer',
                    'remarques' => 'string',
            ],
            [
                'remarques.string' => 'Les remarques doivent être un texte.'
            ]);

        $avis->update([
            'quality_prestation' => $request['quality_prestation'],
            'delai_livraison' => $request['delai_livraison'],
            'quality_sav' => $request['quality_sav'],
            'quality_site' => $request['quality_site'],
            'understand_demande' => $request['understand_demande'],
            'services_needs' => $request['services_needs'],
            'remarques' => $request['remarques'],

        ]);
            return redirect('https://www.mongraphisme.com') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avis $avis)
    {
        //
    }
}
