<?php

namespace App\Http\Controllers;

use App\judet;
use Illuminate\Http\Request;

class judetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judet = judet::all()->toArray();
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
     * @param  \App\judet  $judet
     * @return \Illuminate\Http\Response
     */
    public function show(judet $judet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\judet  $judet
     * @return \Illuminate\Http\Response
     */
    public function edit(judet $judet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\judet  $judet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, judet $judet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\judet  $judet
     * @return \Illuminate\Http\Response
     */
    public function destroy(judet $judet)
    {
        //
    }
}
