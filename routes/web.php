<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(Request $request){

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
    return view('welcome',compact('carte'));
}
);

Route::get("/Filter",'BookController@priceFilter');


Route::get("/testDB", function(){

});

Route::get('/book/{bookID}','BookController@show');
Route::get('/submit','SaleController@store');
Route::get( '/succes',function(){
return view('succes');
});

Route::get('/cautare', 'BookController@search')->name('cautare');;


Auth::routes();

Route::get('/home', 'HomeController.php@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController.php@index')->name('home');

Route::group(['prefix' => 'cost'], function(){
    /*
     * Pentru a primi costul unei carti in functie de judet, varsta si categorie
     */
    Route::get('/getCost/{basePrice}/{region}/{age}/{category}', function($basePrice, $region, $age, $category){
       $controller = new CostController;
       return $controller->cost($basePrice, $region, $age, $category);
    });
    Route::get('/version', "VersionController@index");
});

Route::get('/home/{id}', function($id){
   return "User:".$id;
});

Auth::routes();

Route::get('/register', 'RegionController@index')->name('register');


