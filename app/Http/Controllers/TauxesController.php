<?php

namespace App\Http\Controllers;

use App\Models\Taux;
use App\Http\Controllers\Controller;
use App\Http\Requests\TauxesStoreRequest;
use App\Models\Tauxes;
use Illuminate\Http\Request;

class TauxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tauxes = Tauxes::all();
        if($request->has('search'))
        {
            $countries = Tauxes::where('taux_id','like',"%{$request->search}%")-> orWhere('taux_name','like',"%{ $request->search }%")->get();
        }
        return view('tauxes.index', compact('tauxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tauxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TauxesStoreRequest $request)
    {
        Tauxes::create([
            'taux_id' => $request->taux_id,
            'taux_name' => $request->taux_name,
        ]);
        return redirect()->route('tauxes.index')->with('message','Rate Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tauxes  $tauxes
     * @return \Illuminate\Http\Response
     */
    public function show(Tauxes $tauxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tauxes  $tauxes
     * @return \Illuminate\Http\Response
     */
    public function edit(Tauxes $tauxes)
    {
        return view('tauxes.index',compact('tauxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tauxes  $tauxes
     * @return \Illuminate\Http\Response
     */
    public function update(TauxesStoreRequest $request, Tauxes $tauxes)
    {
        $tauxes->update([
            'taux_id' => $request->taux_id,
            'taux_name' => $request->taux_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('tauxes.index')->with('message','Rate updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tauxes  $tauxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tauxes $tauxes)
    {
        $tauxes->delete();

        return redirect()->route('tauxes.index')->with('message','Rate Deleted Successfully');
    }
}
