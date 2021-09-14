<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Http\Requests\SiteStoreRequest;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sites = Site::all();
        if($request->has('search'))
        {
            $sites = Site::where('site_name','like',"%{ $request->search }%")->orWhere('site_id','like',"% $request->search %")->get();
        }
        return view('sites.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Site::create($request->validate([
            'site_id' => ['required','unique:sites', 'max:5'],
             'site_name' => ['required'],
        ]));

        return redirect()->route('sites.index')->with('message','Site Created Successfully');
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
    public function edit(Site $site)
    {
        return view('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteStoreRequest $request, site $site)
    {
        $site->update($request->validated());
        
        return redirect()->route('sites.index')->with('message','Site Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(site $site)
    {
        $site->delete();

        return redirect()->route('sites.index')->with('message','Site Deleted Successfully');
    }
}
