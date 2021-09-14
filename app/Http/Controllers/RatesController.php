<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rates;
use App\Http\Requests\RatesStoreRequest;
use App\Http\Controllers\Controller;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rates = Rates::all();
        if($request->has('search'))
        {
            $rates = Rates::where('taux_id','like',"%{$request->search}%")-> orWhere('taux_name','like',"%{ $request->search }%")->get();
        }
        return view('rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RatesStoreRequest $request)
    {
        Rates::create([
            'taux_id' => $request->taux_id,
            'taux_name' => $request->taux_name,
        ]);
        return redirect()->route('rates.index')->with('message','Rates Added Successfully');
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
    public function edit(Rates $rate)
    {
        return view('rates.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RatesStoreRequest $request, Rates $rate)
    {
        $rate->update([
            'taux_id' => $request->taux_id,
            'taux_name' => $request->taux_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('rates.index')->with('message','Rate updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rate)
    {
        $rate->delete();

        return redirect()->route('rates.index')->with('message','Rate Deleted Successfully');
    }
}
