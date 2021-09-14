<?php

namespace App\Http\Controllers;

use App\Models\ContCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContcategoriesStoreRequest;

class ContCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contCategory = ContCategories::all();
        if($request->has('search'))
        {
            $contCategory = ContCategories::where('type_conteneur_id','like',"%{$request->search}%")-> orWhere('type_conteneur_name','like',"%{ $request->search }%")->get();
        }
        return view('contcategories.index', compact('contcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContcategoriesStoreRequest $request)
    {
        ContCategories::create([
            'type_conteneur_id' => $request->type_conteneur_id,
            'type_conteneur_name' => $request->type_conteneur_name,
        ]);
        return redirect()->route('contcategories.index')->with('message','Type de Conteneur Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContCategories  $contCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ContCategories $contCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContCategories  $contCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(ContCategories $contCategories)
    {
        return view('contcategories.edit', compact('contcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContCategories  $contCategories
     * @return \Illuminate\Http\Response
     */
    public function update(ContcategoriesStoreRequest $request, ContCategories $contCategory)
    {
        $contCategory->update([
            'type_conteneur_id' => $request->type_conteneur_id,
            'type_conteneur_name' => $request->type_conteneur_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('contcateneurs.index')->with('message','Type de Conteneur updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContCategories  $contCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContCategories $contCategories)
    {
        $contCategories->delete();

        return redirect()->route('contcategories.index')->with('message','Type de Conteneur Deleted Successfully');
    }
}
