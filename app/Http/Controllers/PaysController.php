<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaysStoreRequest;
use App\Models\Pays;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pays = pays::all();
        if($request->has('search'))
        {
            $pays = pays::where('pays_name','like',"%{ $request->search }%")->orWhere('pays_id','like',"% $request->search %")->get();
        }
        return view('pays.index',compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pays::create($request->validate([
            'pays_id' => ['required','unique:pays'],
             'pays_name' => ['required','unique:pays'],
        ]));

        return redirect()->route('pays.index')->with('message','Pays Added Successfully');
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
    public function edit(Pays $pays)
    {
        return view('pays.edit', compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaysStoreRequest $request, Pays $pays)
    {
        $pays->update($request->validated());
        
        return redirect()->route('pays.index')->with('message','Pays Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pays $pays)
    {
        $pays->delete();

        return redirect()->route('pays.index')->with('message','Pays Deleted Successfully');
    }
}
