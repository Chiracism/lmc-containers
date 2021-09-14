<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navires;
use App\Http\Requests\NaviresStoreRequest;

class NaviresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $navire = Navires::all();
        if($request->has('search'))
        {
            $navire = Navires::where('navire_id','like',"%{$request->search}%")-> orWhere('navire_name','like',"%{ $request->search }%")->get();
        }
        return view('navires.index', compact('navire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('navires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NaviresStoreRequest $request)
    {
        Navires::create([
            'navire_id' => $request->navire_id,
            'navire_name' => $request->navire_name,
        ]);
        return redirect()->route('navires.index')->with('message','Navire Added Successfully');
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
    public function edit(Navires $navire)
    {
        return view('navires.edit',compact('navire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NaviresStoreRequest $request,Navires $navire)
    {
        $navire->update([
            'navire_id' => $request->navire_id,
            'navire_name' => $request->navire_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('navires.index')->with('message','Navire updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navires $navire)
    {
        $navire->delete();

        return redirect()->route('navires.index')->with('message','Navire Deleted Successfully');
    }
}
