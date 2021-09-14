<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sizes;
use App\Http\Controllers\Controller;
use App\Http\Requests\SizesStoreRequest;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $size = Sizes::all();
        if($request->has('search'))
        {
            $size = Sizes::where('size_id','like',"%{$request->search}%")->orWhere('size_name','like',"%{ $request->search }%")->get();
        }
        return view('sizes.index', compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizesStoreRequest $request)
    {
        Sizes::create([
            'size_id' => $request->size_id,
            'size_name' => $request->size_name,
        ]);
        return redirect()->route('sizes.index')->with('message','Size Added Successfully');
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
    public function edit(Sizes $size)
    {
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizesStoreRequest $request,Sizes $size)
    {
        $size->update([
            'size_id' => $request->size_id,
            'size_name' => $request->size_name,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('sizes.index')->with('message','Size updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sizes $size)
    {
        $size->delete();

        return redirect()->route('sizes.index')->with('message','Size Deleted Successfully');
    }
}
