<?php

namespace App\Http\Controllers;

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
    public function store()
    {
        $userID= Input::get('user');
        $bookID=  Input::get('book');
        $cantitate=  Input::get('cantitate');
        $pret=  Input::get('price');
        $data_vanzarii= Carbon\Carbon::now();
        $sale = ['userID'=>$userID,'bookID'=>$bookID,'cantitate'=>$cantitate,'pret'=>$pret,'data_vanzarii'=>$data_vanzarii];
        DB::table('sales')->insert($sale);
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
