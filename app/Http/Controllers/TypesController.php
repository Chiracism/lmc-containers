<?php

namespace App\Http\Controllers;

use App\Models\types;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use App\http\Requests\TypeStoreRequest;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = types::all();
        if($request->has('search'))
        {
            $types = types::where('type_id','like',"%{$request->search}%")-> orWhere('type_name','like',"%{ $request->search }%")->get();
        }
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeStoreRequest $request)
    {
        types::create([
            'type_id' => $request->type_id,
            'type_name' => $request->type_name,
        ]);
        return redirect()->route('types.index')->with('message','Type Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit(types $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(TypeStoreRequest $request, types $type)
    {
        $type->update([
            'type_id' => $request->type_id,
            'type_name' => $request->type_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('types.index')->with('message','Type updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy(types $type)
    {
        $type->delete();

        return redirect()->route('types.index')->with('message','Type Deleted Successfully');
    }
}
