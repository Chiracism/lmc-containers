<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owners;
use app\Http\Controllers\Controller;
use App\Http\Requests\OwnersStoreRequest;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $owner = Owners::all();
        if($request->has('search'))
        {
            $owner = Owners::where('owner_name','like',"%{$request->search}%")-> orWhere('owner_id','like',"%{ $request->search }%")->get();
        }
        return view('owners.index', compact('owner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnersStoreRequest $request)
    {
        Owners::create([
            'owner_id' => $request->owner_id,
            'owner_name' => $request->owner_name,
        ]);
        return redirect()->route('owners.index')->with('message','Owner Added Successfully');
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
    public function edit(Owners $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnersStoreRequest $request,Owners $owner)
    {
        $owner->update([
            'owner_id' => $request->owner_id,
            'owner_name' => $request->owner_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('owners.index')->with('message','Owner updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owners $owner)
    {
        $owner->delete();

        return redirect()->route('owners.index')->with('message','Owner Deleted Successfully');
    }
}
