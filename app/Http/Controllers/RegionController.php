<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judet = Region::all()->toArray();
        return  view('welcome',compact('judet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Region  $judet
     * @return \Illuminate\Http\Response
     */
    public function show(Region $judet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $judet
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $judet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $judet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $judet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $judet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $judet)
    {
        //
    }
}
