<?php

namespace App\Http\Controllers;

use App\Events\ChoixFaitModificationReceived;
use App\Modification;
use App\Propal;
use Illuminate\Http\Request;

class ModificationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Propal $propal)
    {

           
            /*$i = 0 ;
            foreach($request->file('propals') as $propal) {
            $i += 1 ;

            $propalName = 'Proposition_' . $i . '_' . str_replace(' ', '', $conception->type) . '-' 
                                     . str_replace(' ', '-', date('Y-m-d-His')) ;

            $propalExtension = $propal->extension() ;                 

            $propalPath = $propal->storeAs('docs', $propalName . '.' . $propalExtension) ;

            $propalNameExtension = $propalName . '.' . $propalExtension ;
        }*/


                $data = [
                    'explication' => $request['explication'],
                ];


         /*   $propalExistant = $propal->conception->propals()
                                                ->whereNotNull('user_id')
                                                ->where('id', $propal->id)
                                                ->first() ;
        if ($propalExistant)
        {
            $propalExistant->user_id = NULL ;
            $propalExistant->save(); 
        }*/

            $propal->user_id = $propal->conception->user_id ; //auth()->user()->ID ;
            $propal->save();
            
            //return redirect('/propositions/' . $propal->id ) ;
            //return back() ;  

            $propalModificationExistant = $propal->modification()->first() ;
        if (!$propalModificationExistant)
        {

            $propal->modification()->save(new Modification($data));

        }
        else
        {
            $propalModificationExistant->delete() ;
            $propal->modification()->save(new Modification($data));

        }
        switch ($propal->conception->getCountModifications()) {
            case 0:
                $upgrade  = 6;
                break;
            case 1:
                $upgrade  = 9;
                break;   
            case 2:
                $upgrade  = 12;
                break;                             
            
            default:
                dd('problème avec l\'upgrade system niveau ModificationController@store');
                break;
        }
            
            //$upgrade += $propal->conception->status->id ;
            $propal->conception->upgradeStatus( $upgrade );
            ChoixFaitModificationReceived::dispatch($propal->conception) ;
            //dd($upgrade) ;

            return redirect('/') ;

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function show(Modification $modification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function edit(Modification $modification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modification $modification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modification $modification)
    {
        //
    }
}
