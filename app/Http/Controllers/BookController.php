<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Author;
use App\book;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
  public function __construct()
  {
      $this->middleware(function ($request, $next) {
// fetch session and use it in entire class with constructor
          $info = session()->has('cod_ok');
          $is_auth=Auth::check();
          if($is_auth && !$info){
              Redirect::to('/2fa')->send();;
          }
            return $next($request);
        });
  }

    public function index(Request $request)
    {
        if($request->has('titlu'))
            if($request->input('titlu')=='crescator')
            {    $carte= Book::orderBy('title','asc')->paginate(12);
                return view('welcome',compact('carte'));;
            }
            else if($request->input('titlu')=='descrescator')
            {    $carte= Book::orderBy('title','desc')->paginate(12);
                return view('welcome',compact('carte'));;
            }
        if($request->has('autor'))
            if($request->input('autor')=='crescator')
            {    $carte=Book::select('books.id','authorID','title','base_price', 'image', 'stoc', 'descriere','categoryID')
                ->join('authors', 'books.authorID','=','authors.id')
                ->join('people','authors.personID','=','people.id')
                ->orderBy('people.prenume','asc')
                ->orderBy('people.nume','asc')
                ->orderBy('title','asc')->paginate(12);

                return view('welcome',compact('carte'));;
            }
            else if($request->input('autor')=='descrescator')
            { $carte=Book::select('books.id','authorID','title','base_price', 'image', 'stoc', 'descriere','categoryID')
                ->join('authors', 'books.authorID','=','authors.id')
                ->join('people','authors.personID','=','people.id')
                ->orderBy('people.prenume','desc')
                ->orderBy('people.nume','desc')
                ->orderBy('title','desc')->paginate(12);

                return view('welcome',compact('carte'));;
            }

        $carte= Book::latest()->paginate(12);

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
            'person' => $person ?? "emptyPerson",
            'region' => $region ?? "emptyRegion"
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
    if(!$request->searchstr) {
        $carte = book::latest()->paginate(12);
        return view('welcome', compact('carte'));
    }

        $str = $request->searchstr;

        $carte=Book::select('books.id','authorID','title','base_price', 'image', 'stoc', 'descriere','categoryID')
            ->join('authors', 'books.authorID','=','authors.id')
            ->join('people','authors.personID','=','people.id')->where('title', 'LIKE', '%' .$str. '%')
            ->join('regions','regions.id','=','judetID')
            ->orwhere('people.nume', 'LIKE', '%' .$str. '%')
            ->orwhere('people.prenume', 'LIKE', '%' .$str. '%')
            ->orwhere('regions.name', 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT_WS(" ", nume, prenume)'), 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT_WS(" ", prenume, nume)'), 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT(prenume," ",nume," ",title)'), 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT(nume," ",prenume," ",title)'), 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT(title," ",prenume," ",nume)'), 'LIKE', '%' .$str. '%')
            ->orwhere(DB::raw('CONCAT(title," ",nume," ",prenume)'), 'LIKE', '%' .$str. '%')
            ->paginate(12);

        return view ('welcome',compact('carte'));
}


public function priceFilter(Request $request){
   if(!$request->input('minvalue') || !$request->input('select')){
       $carte= book::latest()->paginate(12);
       return view ('welcome',compact('carte'));
   }

    $min=$request->input('minvalue');
    $max=$request->input('maxvalue');
    $sort=$request->input('select');

    if($sort=='/')
        $carte=Book::where('base_price','>',$min)->where('base_price','<',$max)->paginate(12);
    if($sort=='/?titlu=crescator')
        $carte=Book::where('base_price','>',$min)->where('base_price','<',$max)->orderBy('title','asc')->paginate(12);
    if($sort=='/?titlu=descrescator')
        $carte=Book::where('base_price','>',$min)->where('base_price','<',$max)->orderBy('title','desc')->paginate(12);
    if($sort=='/?autor=crescator')
        $carte=Book::select('books.id','authorID','title','base_price', 'image', 'stoc', 'descriere','categoryID')
            ->join('authors', 'books.authorID','=','authors.id')
            ->join('people','authors.personID','=','people.id')
            ->where('base_price','>',$min)
            ->where('base_price','<',$max)
            ->orderBy('people.prenume','asc')
            ->orderBy('people.nume','asc')
            ->orderBy('title','asc')->paginate(12);
    if($sort=='/?autor=descrescator')
        $carte=Book::select('books.id','authorID','title','base_price', 'image', 'stoc', 'descriere','categoryID')
            ->join('authors', 'books.authorID','=','authors.id')
            ->join('people','authors.personID','=','people.id')
            ->where('base_price','>',$min)
            ->where('base_price','<',$max)
            ->orderBy('people.prenume','asc')
            ->orderBy('people.nume','asc')
            ->orderBy('title','asc')->paginate(12);
    return view ('welcome',compact('carte'));
}
}
