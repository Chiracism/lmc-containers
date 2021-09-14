<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SoussitesStoreRequest;
use App\Models\Site;
use App\Models\Sous_site;
use App\Models\Sous_sites;

class SousSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sous_site = Sous_sites::all();
        if($request->has('search'))
        {
            $sous_site = Sous_sites::where('site_id','like',"%{$request->search}%")-> orWhere('sous_site_name','like',"%{ $request->search }%")->get();
        }
        return view('sous_sites.index', compact('sous_site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = Site::all(); 
        return view('sous_sites.create',compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoussitesStoreRequest $request)
    {
        Sous_sites::create($request->validated());
        return redirect()->route('sous_sites.index')->with('message','Sous-site Added Successsfuly');
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
    public function edit(Sous_sites $sous_site)
    {
        $site = Site::all();
        return view('sous_sites.edit', compact('sous_site','site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SoussitesStoreRequest $request, Sous_sites $sous_site)
    {
        // $sous_site->update([
        //     'site_id' => $request ->site_id,
        //     'sous_site_name' => $request ->sous_site_name
        // ]);
        $sous_site->update($request->validated());
        return redirect()->route('sous_sites.index')->with('message','Sous-site Updated Successsfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sous_sites $sous_site)
    {
        $sous_site->delete();

        return redirect()->route('sous_sites.index')->with('message','Sous-Site Deleted Successfully');
    }
}
