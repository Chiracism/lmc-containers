<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\EtatdeConteneur;
use App\Models\MasterFiles;
use App\Models\Mouvements;
use App\Models\Navires;
use App\Models\Ports;
use App\Models\Site;
use App\Models\Sizes;
use App\Models\Sous_sites;
use App\Models\types;
use Illuminate\Http\Request;

class MouvementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mouvement = Mouvements::all();
        if($request->has('search'))
        {
            $mouvement = Mouvements::where('numero_conteneur','like',"%{ $request->search }%")->orWhere('client','like',"% $request->search %")->get();
        }
        return view('mouvements.index', compact('mouvement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Sizes::all();
        $type = types::all();
        $etatdeConteneur = EtatdeConteneur::all();
        $client = Clients::all();
        $port = Ports::all();
        $navire = Navires::all();
        $site = Site::all();
        $sous_site = Sous_sites::all();
        $masterfile = MasterFiles::all();
        return view('mouvements.create', compact('masterfile','site','sous_site','navire','port','client','etatdeConteneur','type','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_conteneur' => ['required', 'string', 'max:50'],
            'site' => ['required', 'string', 'max:50'],
            'sous_site' => ['required', 'string', 'max:50'],
            'date_mouvement' => ['required', 'date'],
            'ex_navire' => ['required', 'string', 'max:191'],
            'date_arrivee' => ['required', 'date'],
            'port' => ['required', 'string', 'max:191'],
            'client' => ['required', 'string', 'max:191'],
            'etat_conteneur' => ['required', 'string', 'max:100'],
            'type_conteneur' => ['required', 'string', 'max:100'],
            'size' => ['required', 'string', 'max:100'],
            'nombre_conteneur' => ['required', 'string', 'max:20'],
            'observation' => ['required', 'string', 'max:255'],
        ]);
        Mouvements::query()->create([
            'numero_conteneur' => $request-> numero_conteneur,
            'site' => $request-> site,
            'sous_site' => $request-> sous_site,
            'date_mouvement' => $request-> date_mouvement,
            'ex_navire' => $request-> ex_navire,
            'date_arrivee' => $request-> date_arrivee,
            'port' => $request-> port,
            'client' => $request-> client,
            'etat_conteneur' => $request-> etat_conteneur,
            'type_conteneur' => $request-> type_conteneur,
            'size' => $request-> size,
            'nombre_conteneur' => $request-> nombre_conteneur,
            'observation' => $request-> observation,
        ]);
        return redirect()->route('mouvements.index')->with('message','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mouvements  $mouvements
     * @return \Illuminate\Http\Response
     */
    public function show(Mouvements $mouvements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mouvements  $mouvements
     * @return \Illuminate\Http\Response
     */
    public function edit(Mouvements $mouvements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mouvements  $mouvements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mouvements $mouvements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mouvements  $mouvements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mouvements $mouvements)
    {
        //
    }
}
