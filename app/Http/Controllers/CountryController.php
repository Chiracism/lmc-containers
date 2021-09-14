<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Countries;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Countries::all();
        if($request->has('search'))
        {
            $countries = Countries::where('country_name','like',"%{$request->search}%")-> orWhere('country_id','like',"%{ $request->search }%")->get();
        }
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request,)
    {
        Countries::create([
            'country_id' => $request->country_id,
            'country_name' => $request->country_name,
        ]);
        return redirect()->route('countries.index')->with('message','Country Added Successfully');
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
    public function edit(Countries $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, Countries $country)
    {
        $country->update([
            'country_id' => $request->country_id,
            'country_name' => $request->country_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('countries.index')->with('message','Country updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countries $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('message','Country Deleted Successfully');
    }
}
