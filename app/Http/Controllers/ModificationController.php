<?php

namespace App\Http\Controllers;

use App\Document;
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


                $validatedData = $request->validate([
                    'explication' => 'required|string',
                    'doc.*'         => 'sometimes|required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/pdf,image/png,image/jpeg'
            ],
            [
                'doc.mimetypes' => 'Les documents doivent être du format Word, Pownerpoint, Excel, PDF ou une image.'
            ]);

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

            $modification = $propal->modification()->save(new Modification($data));

        }
        else
        {
            $propalModificationExistant->delete() ;
            $modification = $propal->modification()->save(new Modification($data));

        }

            if ($request->has('doc'))
                {
                                
                foreach($request->file('doc') as $document)
                {
                    $destinationPath = $document->store('docs') ;
                    $filename = $document->getClientOriginalName();
                    $documentConception = new Document([
                        'lien' => $destinationPath,
                        'nomDocument' => $filename
                    ]);
                    $modification->document()->save($documentConception);
                    }
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

            return redirect('/')->with('message','Modification reçue !') ; ;

      
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
