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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/testDB", function(){

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cost'], function(){
    Route::get('/getCost/{basePrice}', function($basePrice){
       $controller = new CostController;
       return $controller->cost($basePrice);
    });
});

Route::get('/home/{id}', function($id){
   return "User:".$id;
});
