<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Sizes;
use App\Models\types;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SizesController;
use App\Models\Clients;
use App\Models\Devise;
use App\Models\EtatdeConteneur;
use App\Models\MasterFiles;
use App\Models\Materiels;
use App\Models\Owners;
use App\Models\Sous_sites;
use App\Http\Requests\MasterfilesStoreRequest;

class MasterFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $masterfile = MasterFiles::all();
        if($request->has('search'))
        {
            $masterfile = MasterFiles::where('numero_conteneur','like',"%{ $request->search }%")->orWhere('client','like',"% $request->search %")->get();
        }
        return view('masterfiles.index', compact('masterfile'));
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
        $owner = Owners::all();
        $client = Clients::all();
        $etatdeConteneur = EtatdeConteneur::all();
        $type = types::all();
        $site = Site::all(); 
        $country = Countries::all();
        $size = Sizes::all();
        // return view('sous_sites.create',compact('site'));
        return view('masterfiles.create',compact('country','client','owner','materiel','devise','site','sous_site','type','size','etatdeConteneur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // MasterFiles::create($request->validated());
        
        $request->validate([
            'numero_conteneur' => ['required', 'string', 'max:191'],
            'pays_id' => ['required', 'string', 'max:191'],
            'type_conteneur_id' => ['required', 'string', 'max:191'],
            'taille_conteneur_id'=> ['required', 'string', 'max:191'],
            'materiel_id' => ['required', 'string', 'max:191'],
            'proprietaire_id' => ['required', 'string', 'max:191'],
            'etat_conteneur_id' => ['required', 'string'],
            'constructeur'=> ['required', 'string', 'max:191'],
            'date_fabrication'=> ['required', 'date'],
            'date_entrer_service' => ['required', 'date'],
            'date_derniere_inspection' => ['required', 'date'],
            'valeur_assuree' => ['required', 'string', 'max:191'],
            'devise_id' => ['required', 'string', 'max:191'],
            'societe_inspection' => ['required', 'string', 'max:191'],
            'dernier_constat' => ['required', 'string', 'max:191'],
            'site_id' => ['required', 'string', 'max:191'],
            'sous_site_id' => ['required', 'string', 'max:191'],
            'date_mouvement' => [ 'required', 'date'],
            'observation' => ['required', 'string', 'max:191'],
            'client' => ['required', 'string', 'max:191'],
            'date_operation'=> ['required', 'date'],
            'montant' => ['required', 'string', 'max:191'],
            'numero_recu' => ['required', 'string', 'max:191'],
            
        ]);

        MasterFiles::query()->create([
            'numero_conteneur' => $request->numero_conteneur, 
            'pays_id' => $request ->pays_id,
            'type_conteneur_id' => $request ->type_conteneur_id,
            'taille_conteneur_id' =>$request ->taille_conteneur_id,
            'materiel_id' =>$request->materiel_id,
            'proprietaire_id' =>$request ->proprietaire_id,
            'etat_conteneur_id' => $request -> etat_conteneur_id,
            'constructeur' => $request ->constructeur,
            'date_fabrication' => $request ->date_fabrication,
            'date_entrer_service' => $request ->date_entrer_service,
            'date_derniere_inspection' => $request ->date_derniere_inspection,
            'valeur_assuree' => $request -> valeur_assuree,
            'devise_id' => $request ->devise_id,
            'societe_inspection' =>$request ->societe_inspection,
            'dernier_constat' =>$request ->dernier_constat,
            'site_id' => $request -> site_id,
            'sous_site_id' => $request -> sous_site_id,
            'date_mouvement' => $request -> date_mouvement,
            'observation' => $request -> observation,
            'client' => $request->client,
            'date_operation' => $request -> date_operation,
            'montant' => $request -> montant,
            'numero_recu' => $request -> numero_recu

        ]);


        return redirect()->route('masterfiles.index')->with('message','Data Added Successfully');
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
    public function edit(MasterFiles $masterfile)
    {
        $sous_site = Sous_sites::all();
        $site= Site::all();
        $devise = Devise::all();
        $materiel = Materiels::all();
        $owner = Owners::all();
        $client = Clients::all();
        $etatdeConteneur = EtatdeConteneur::all();
        $type = types::all();
        $site = Site::all(); 
        $country = Countries::all();
        $size = Sizes::all();
        return view('masterfiles.edit', compact('masterfile','country','client','owner','materiel','devise','site','sous_site','type','size','etatdeConteneur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MasterfilesStoreRequest $request, MasterFiles $masterfile)
    {
        $masterfile->update([
            'numero_conteneur' => $request->numero_conteneur,
            'pays_id' => $request->pays_id,
            'type_conteneur_id' => $request ->type_conteneur_id,
            'taille_conteneur_id' =>$request ->taille_conteneur_id,
            'materiel_id' =>$request->materiel_id,
            'proprietaire_id' =>$request ->proprietaire_id,
            'etat_conteneur_id' => $request -> etat_conteneur,
            'constructeur' => $request ->constructeur,
            'date_fabrication' => $request ->date_fabrication,
            'date_entrer_service' => $request ->date_entrer_service,
            'date_derniere_inspection' => $request ->date_derniere_inspection,
            'valeur_assuree' => $request -> valeur_assuree,
            'devise_id' => $request ->devise_id,
            'societe_inspection' =>$request ->societe_inspection,
            'dernier_constat' =>$request ->dernier_constat,
            'site_id' => $request -> site_id,
            'sous_site_id' => $request -> sous_site_id,
            'date_mouvement' => $request -> date_mouvement,
            'observation' => $request -> observation,
            'client' => $request->client,
            'date_operation' => $request -> date_operation,
            'montant' => $request -> montant,
            'numero_recu' => $request -> numero_recu
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('masterfiles.index')->with('message','Data updated Successfully');
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
