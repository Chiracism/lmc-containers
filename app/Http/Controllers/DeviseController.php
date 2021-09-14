<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use Illuminate\Http\Request;
use App\Http\Requests\DevisesStoreRequest;

class DeviseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devises = Devise::all();
        if($request->has('search'))
        {
            $devises = Devise::where('devise_id','like',"%{$request->search}%")-> orWhere('devise_name','like',"%{ $request->search }%")->get();
        }
        return view('devises.index',compact('devises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisesStoreRequest $request)
    {
        Devise::create([
            'devise_id' => $request->devise_id,
            'devise_name' => $request->devise_name,
        ]);
        return redirect()->route('devises.index')->with('message','Devise Added Successfully');
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
    public function edit(Devise $devise)
    {
        return view('devises.edit', compact('devise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DevisesStoreRequest $request,Devise $devise)
    {
        $devise->update([
            'devise_id' => $request->devise_id,
            'devise_name' => $request->devise_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('devises.index')->with('message','Devise Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devise $devise)
    {
        $devise->delete();

        return redirect()->route('devises.index')->with('message','Devise Deleted Successfully');
    }
}
