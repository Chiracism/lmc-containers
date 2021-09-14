<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PortsStoreRequest;
use App\Models\Ports;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $port = Ports::all();
        if($request->has('search'))
        {
            $port = Ports::where('port_id','like',"%{$request->search}%")-> orWhere('port_name','like',"%{ $request->search }%")->get();
        }
        return view('ports.index', compact('port'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortsStoreRequest $request)
    {
        Ports::create([
            'port_id' => $request->port_id,
            'port_name' => $request->port_name,
        ]);
        return redirect()->route('ports.index')->with('message','Port Added Successfully');
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
    public function edit(Ports $port)
    {
        return view('ports.edit',compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortsStoreRequest $request, Ports $port)
    {
        $port->update([
            'port_id' => $request->port_id,
            'port_name' => $request->port_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('ports.index')->with('message','Port Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ports $port)
    {
        $port->delete();

        return redirect()->route('ports.index')->with('message','Port Deleted Successfully');
    }
}
