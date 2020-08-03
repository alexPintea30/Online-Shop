<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Support\Facades\DB;
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
        return view('welcome',compact('carte'));
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

    public function search(Request $request){

        $string = $request->searchstr;
        $s = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);
        $carte = collect([]);

        foreach($s as $str)

        {
            $carte = Book::where('title', 'LIKE', '%' .$str. '%')
                ->orwhereIN('authorID', function ($query) use ($str) {
                    $query->select('id')
                        ->from('authors')
                        ->whereIn('personID', function ($query2) use ($str) {
                            $query2->select('id')
                                ->from('people')
                                ->where('nume', 'LIKE', '%' .$str. '%')
                                ->orwhere('prenume', 'LIKE', '%' .$str. '%')
                                ->orwherein('judetID', function ($query3) use ($str) {
                                    $query3->select('id')
                                        ->from('regions')
                                        ->where('name', 'LIKE', '%' .$str. '%');
                                });
                        });
                })->paginate(12);
        }



        return view ('welcome',compact('carte'));

}
}
