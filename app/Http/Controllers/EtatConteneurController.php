<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EtatdeConteneur;
use App\Http\Requests\EtatConteneurStoreRequest;
use Illuminate\Http\Request;

class EtatConteneurController extends Controller
{
    public function index(Request $request)
    {
        $etatdeConteneurs = EtatdeConteneur::all();
        if($request->has('search'))
        {
            $etatdeConteneurs = EtatdeConteneur::where('etat_conteneur_id','like',"%{ $request->search }%")->orWhere('etat_conteneur_name','like',"% $request->search %")->get();
        }
        return view('etatdeConteneurs.index', compact('etatdeConteneurs'));
    }

    public function create()
    {
        return view('etatdeConteneurs.create');
    }

    public function store(EtatConteneurStoreRequest $request)
    {
        etatdeConteneur::create($request->validated());

        return redirect()->route('etatdeConteneurs.index')->with('message','Conteneur State Created Successfully');
    }

    public function edit(etatdeConteneur $etatdeConteneur)
    {
        return view('etatdeConteneurs.edit', compact('etatdeConteneur'));
    }

    public function update(EtatConteneurStoreRequest $request, etatdeConteneur $etatdeConteneur)
    {
        $etatdeConteneur->update($request->validated());
        
        return redirect()->route('etatdeConteneurs.index')->with('message','Conteneur State Updated Successfully');
    }

    public function destroy(etatdeConteneur $etatdeConteneur)
    {
        $etatdeConteneur->delete();

        return redirect()->route('etatdeConteneurs.index')->with('message','Conteneur State Deleted Successfully');
    }
}
