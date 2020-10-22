<?php

namespace App\Http\Controllers;

use App\Conception;
use App\Events\ConceptionValidatedPdfRequired;
use App\Events\ModificationApplied;
use App\Events\PropalsCreated;
use App\Http\Traits\ImageWidthHeight;
use App\Modification;
use App\Propal;
use App\Type;
use Corcel\Model\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageIntervention;

class PropalController extends Controller
{
    use ImageWidthHeight ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conception $conception)
    {
        //return view('propositions.index', ['propositions' => $conception->propals]) ;
        return view('propositions.index', ['propositions' => $conception->propals()
                                                                    ->get()
                                                                    ->sortBy('id')
                                                                    ->take(3),
                                            'conception' => $conception,
                                            'types' => Type::all(), 
                                        ]) ;        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
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
            $resize = ImageIntervention::make($propal)->encode('jpg');
            $resize->resize($this->getNewWidth($resize->width(), $resize->height(), 800), $this->getNewHeight($resize->width(), $resize->height(), 800) ,function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $propalName = 'Proposition_' . $i . '_' . str_replace(' ', '', $conception->type) . '-' 
                                     . str_replace(' ', '-', date('Y-m-d-His')) ;

            $path = "{$propalName}.jpeg";
            $watermark = ImageIntervention::make(public_path('storage/img/watermark.png'));
            $resize->insert($watermark, 'center') ;
            $resize->save('storage/propals/'.$path);

                $propalConception = new Propal([
                    'lien' => $path,

                ]);            
                $conception->propals()->save($propalConception);
            }

            $conception->upgradeStatus(4) ;
            PropalsCreated::dispatch($conception) ;
            return back()->with('message','Propositions envoyées !') ; 
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
            $resize = ImageIntervention::make($propal)->encode('jpg');
            
            $resize->resize($this->getNewWidth($resize->width(), $resize->height(), 800), $this->getNewHeight($resize->width(), $resize->height(), 800) ,function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $propalName = 'Modification_' . $i . '_' . str_replace(' ', '', $conception->type) . '-' 
                                     . str_replace(' ', '-', date('Y-m-d-His')) ;
            $path = "{$propalName}.jpeg";
            $watermark = ImageIntervention::make(public_path('storage/img/watermark.png'));
            $resize->insert($watermark, 'center') ;
            $resize->save('storage/propals/'.$path);

                $propalConception = new Propal([
                    'lien' => $path,
                    'modification_id' => $Modification->id,
                    'user_id' => $conception->user_id,
                ]);
                $conception->propals()->save($propalConception);
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
                
            return back()->with('message','Fichier envoyé !') ;
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

        if ($propal->conception->status_id === 14 )
        {
          if ( $propal->conception->propalModifiee() !== null )
          {
            $propal = Propal::find($propal->conception->propalModifiee()->id) ;
          }
          else
          {
            $propal = Propal::find($propal->conception->propalChoisie()->id) ;
          }
            
            return view('propositions.final', ['proposition'    => $propal ,
                                              'modifications'   => $propal->modification(),
                                              'types'           => Type::all(),
                                              'count'           => $propal->conception
                                                                ->getCountModifications(),
                                            ]) ;              
        }
        else
        {
            return view('propositions.show', ['proposition'     => $propal , 
                                              'modifications'   => $propal->modification(),
                                              'types'           => Type::all(),
                                              'count'           => $propal->conception
                                                                ->getCountModificationsRestantes(),
                                            ]) ;  
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propal  $propal
     * @return \Illuminate\Http\Response
     */
    public function edit(Propal $propal)
    {
        return view('propositions.edit', ['proposition' => $propal,
                                          'types'       => Type::all(),
                                          'count'       => $propal->conception
                                                            ->getCountModificationsRestantes(), 
                                    ]);  
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

            $propal->user_id = $conception->user_id ; //auth()->user()->ID ;
            $propal->save();

        if($request->has('upgrade'))
        {
            switch (Request('upgrade')) {
                case '3' :
                $conception->upgradeStatus(14) ;
                break;                                                          
                default:
                abort(403) ;
                break;
            }

                ConceptionValidatedPdfRequired::dispatch($conception) ;
                return redirect('/propositions/' . $propal->id)->with('message','Conception Validée !') ;
        }                 
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
