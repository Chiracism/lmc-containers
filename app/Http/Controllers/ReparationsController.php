<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Countries;
use App\Models\Devise;
use App\Models\EtatdeConteneur;
use App\Models\MasterFiles;
use App\Models\Materiels;
use App\Models\Owners;
use App\Models\Rates;
use App\Models\Reparations;
use App\Models\Site;
use App\Models\Sizes;
use App\Models\Sous_sites;
use App\Models\Taux;
use App\Models\Tauxes;
use App\Models\types;
use Illuminate\Http\Request;

class ReparationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reparations = Reparations::all();
        if($request->has('search'))
        {
            $reparations = Reparations::where('numero_conteneur','like',"%{ $request->search }%")->orWhere('client','like',"% $request->search %")->get();
        }
        return view('reparations.index', compact('reparations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sous_site = Sous_sites::all();
        $site= Site::all();
        $devise = Devise::all();
        $materiel = Materiels::all();
        $masterfile = MasterFiles::all();
        $owner = Owners::all();
        $client = Clients::all();
        $etatdeConteneur = EtatdeConteneur::all();
        $type = types::all();
        $site = Site::all(); 
        $rate = Rates::all();
        $country = Countries::all();
        $tauxes = Tauxes::all();
        $size = Sizes::all();
        // return view('sous_sites.create',compact('site'));
        return view('reparations.create',compact('country','client','owner','materiel','masterfile','devise','site','rate','sous_site','tauxes','type','size','etatdeConteneur'));
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
            'numero_conteneur' => ['required', 'string', 'max:191'],
            'date_derniere_reparation' => ['required','date'],
            'type_conteneur_id' => ['required', 'string', 'max:191'],
            'taille_conteneur_id' => ['required', 'string', 'max:191'],
            'proprietaire_id' => ['required', 'string', 'max:191'],
            'pays_name' => ['required', 'string', 'max:255'],
            'taux_name' => ['required', 'float'],
            'heure' => ['required', 'float'],
            'materiel_id' => ['required', 'string', 'max:191'],
            'total' => ['required', 'float'],
            'numero_recu' => ['required', 'string', 'max:191'],
            'societe_reparation' => ['required', 'string', 'max:255'],
            'societe_location' => ['required', 'string', 'max:255'],
            'site_id' => ['required', 'string', 'max:191'],
            'date_derniere_inspection' => ['required','date'],
            'societe' => ['required', 'string', 'max:255'],
        ]);
         Reparations::query()->create([
            'numero_conteneur' => $request->numero_conteneur, 
            'date_derniere_reparation' => $request->date_derniere_reparation,
            'type_conteneur_id' => $request->type_conteneur_id,
            'taille_conteneur_id' => $request->taille_conteneur_id,
            'proprietaire_id' => $request->proprietaire_id,
            'pays_name' => $request->pays_name,
            'taux_name' => $request->taux_name,
            'heure' => $request->heure,
            'materiel_id' => $request->materiel_id,
            'total' => $request->total,
            'numero_recu' => $request->numero_recu,
            'societe_reparation' => $request->societe_reparation,
            'societe_location' => $request->societe_location,
            'site_id' => $request->site_id,
            'date_derniere_inspection' => $request->date_derniere_inspection,
            'societe' => $request->societe,
        ]);

        return redirect()->route('reparations.index')->with('message','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
