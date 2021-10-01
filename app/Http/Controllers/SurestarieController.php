<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\MasterFiles;
use App\Models\Navires;
use App\Models\Ports;
use App\Models\Sizes;
use App\Models\Surestaries;
use Illuminate\Http\Request;

class SurestarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surestarie = Surestaries::all();
        if($request->has('search'))
        {
            $surestarie = Surestaries::where('numero_conteneur','like',"%{ $request->search }%")->orWhere('client_name','like',"% $request->search %")->get();
        }
        return view('surestaries.index', compact('surestarie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masterfile = MasterFiles::all();
        $navire = Navires::all();
        $client = Clients::all();
        $port = Ports::all();
        $size = Sizes::all();
        return view ('surestaries.create', compact('masterfile','navire','client','port','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
