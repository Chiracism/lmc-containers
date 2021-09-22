<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Countries;
use App\Models\Devise;
use App\Models\EtatdeConteneur;
use App\Models\Materiels;
use App\Models\Owners;
use App\Models\Reparations;
use App\Models\Site;
use App\Models\Sizes;
use App\Models\Sous_sites;
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
        $owner = Owners::all();
        $client = Clients::all();
        $etatdeConteneur = EtatdeConteneur::all();
        $type = types::all();
        $site = Site::all(); 
        $country = Countries::all();
        $size = Sizes::all();
        // return view('sous_sites.create',compact('site'));
        return view('reparations.create',compact('country','client','owner','materiel','devise','site','sous_site','type','size','etatdeConteneur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
