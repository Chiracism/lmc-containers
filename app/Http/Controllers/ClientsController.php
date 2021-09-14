<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use App\Http\Requests\ClientsStoreRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = Clients::all();
        if($request->has('search'))
        {
            $client = Clients::where('client_id','like',"%{$request->search}%")-> orWhere('client_name','like',"%{ $request->search }%")-> orWhere('client_impot','like',"%{ $request->search }%")-> orWhere('client_idnat','like',"%{ $request->search }%")-> orWhere('address','like',"%{ $request->search }%")-> orWhere('phone','like',"%{ $request->search }%")-> orWhere('email','like',"%{ $request->search }%")-> orWhere('activity','like',"%{ $request->search }%")->get();
        }
        return view('clients.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsStoreRequest $request)
    {
        Clients::create([
            'client_id' => $request->client_id,
            'client_name' => $request->client_name,
            'client_impot' => $request->client_impot,
            'client_idnat' => $request->client_idnat,
            'address' => $request-> address,
            'phone' => $request-> phone,
            'email' => $request->email,
            'activity' => $request ->activity,
        ]);
        return redirect()->route('clients.index')->with('message','Client Added Successfully');
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
    public function edit(Clients $client)
    {
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsStoreRequest $request, Clients $client)
    {
        $client->update([
            'client_id' => $request->client_id,
            'client_name' => $request->client_name,
            'client_impot' => $request->client_impot,
            'client_idnat' => $request->client_idnat,
            'address' => $request-> address,
            'phone' => $request-> phone,
            'email' => $request->email,
            'activity' => $request ->activity, 
        ]);
        return redirect()->route('clients.index')->with('message','Client updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        $clients->delete();

        return redirect()->route('clients.index')->with('message','Client Deleted Successfully');
    }
}
