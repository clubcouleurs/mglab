<?php

namespace App\Http\Controllers;

use App\Graphiste;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class GraphisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd($expDate) ;
        return view('graphistes.index', 
            ['users' => User::whereNotIn('ID', [1])->orderBy('user_registered')->paginate(20),
            'types' => Type::all()]);


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
    public function store(Request $request, User $user)
    {
        if ($user->graphiste === null)
            {
                $graphiste = new Graphiste();
                $user->graphiste()->save($graphiste);
            }

        return back()->with('message','Graphiste crée !') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graphiste  $graphiste
     * @return \Illuminate\Http\Response
     */
    public function show(Graphiste $graphiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graphiste  $graphiste
     * @return \Illuminate\Http\Response
     */
    public function edit(Graphiste $graphiste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graphiste  $graphiste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graphiste $graphiste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graphiste  $graphiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graphiste $graphiste)
    {
        $graphiste->delete() ;
        return back()->with('message','Graphiste détaché !') ; 

    }
}
