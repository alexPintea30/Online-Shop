<?php

namespace App\Http\Controllers;
use App\Book;
use App\Person;
use App\Region;
use Carbon\Carbon;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    {   if(!$req->cantitate)
    {
        $bookID = $req->book;
        $book = Book::find($bookID);
        if(Auth::user()){
            $personID = Auth::user()->personID;
            $person = Person::where('id', '=', $personID)->get();
            $region = Region::where('id', '=', $person[0]['judetID'])->get();
        }
        /*
        $authors = [];
        foreach($carte as $c){
            $authorID = $c['authorID'];
            $authorPersonID = Author::where('id', '=', $authorID)->get(['personID']);
            $authors[$c['id']] = Person::where('id', '=', $authorPersonID)->get('judetID');
        }
        */
        //dd($region["0"]["name"]);

        return view('book',[
            'book' => $book,
            'person' => $person ?? "emptyPerson",
            'region' => $region ?? "emptyRegion"
        ]);
    }
    $stoc=Book::find($req->book)->stoc;
    if($stoc-$req->cantitate < 0)
    {
        $bookID = $req->book;
        $book = Book::find($bookID);
        if(Auth::user()){
            $personID = Auth::user()->personID;
            $person = Person::where('id', '=', $personID)->get();
            $region = Region::where('id', '=', $person[0]['judetID'])->get();
        }
        return view('book',[
            'book' => $book,
            'person' => $person ?? "emptyPerson",
            'region' => $region ?? "emptyRegion"
        ])->with('stocEpuizatMsg','Ati ales o cantitate prea mare! Nu sunt suficiente produse in stoc pentru cantitatea solicitata!');

    }
        $sale= new Sale;
        $sale->userID=$req->user;
        $sale->bookID = $req->book;
        $sale->cantitate = $req->cantitate;
        $sale->pret = ($req->price * $req->cantitate);
        $sale->data_vanzarii = Carbon::now();
        $sale->save();
        Book::find($req->book)->decrement('stoc',$req->cantitate);


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
