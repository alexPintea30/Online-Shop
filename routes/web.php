<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;

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

Route::get('/', 'BookController@index');

Route::get("/testDB", function(){

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
