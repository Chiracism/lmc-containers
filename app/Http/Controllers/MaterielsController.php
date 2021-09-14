<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Materiels;
use App\Http\Requests\MaterielsStoreRequest;

class MaterielsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materiels = Materiels::all();
        if($request->has('search'))
        {
            $materiels = Materiels::where('materiel_id','like',"%{$request->search}%")-> orWhere('materiel_name','like',"%{ $request->search }%")-> orWhere('montant','like',"%{ $request->search }%")->get();
        }
        return view('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterielsStoreRequest $request)
    {
        Materiels::create([
            'materiel_id' => $request->materiel_id,
            'materiel_name' => $request->materiel_name,
            'montant' => $request->montant,
        ]);
        return redirect()->route('materiels.index')->with('message','Materiel Added Successfully');
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
    public function edit(Materiels $materiel)
    {
        return view('materiels.edit', compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterielsStoreRequest $request, Materiels $materiel)
    {
        $materiel->update([
            'materiel_id' => $request->materiel_id,
            'materiel_name' => $request->materiel_name,
            'montant' => $request->montant,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('materiels.index')->with('message','Matériel updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiels $materiel)
    {
        $materiel->delete();

        return redirect()->route('materiels.index')->with('message','Materiel Deleted Successfully');
    }
}
