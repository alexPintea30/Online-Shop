<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   print_r($req->input());
        $sale= new Sale;
        $sale->userID=$req->user;
        $sale->bookID = $req->book;
        $sale->cantitate = $req->cantitate;
        $sale->pret = $req->price;
        $sale->data_vanzarii = Carbon::now();
        $sale->save();
        return redirect('/succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $vanzari
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $vanzari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $vanzari
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $vanzari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $vanzari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $vanzari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $vanzari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $vanzari)
    {
        //
    }
}
