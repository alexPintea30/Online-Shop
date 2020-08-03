<?php

namespace App\Http\Controllers;

use App\Author;
use App\book;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Person;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carte= book::latest()->paginate(12);
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

        return view('welcome',[
            'carte' => $carte,
            'person' => $person ?? "dasda",
            'region' => $region ?? "asdasd"
        ]);
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
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        //
    }
}
