<?php

use App\Http\Controllers\PriceController;
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

Route::get('/book/{bookID}','BookController@show');

Route::get('/submit','SaleController@store');

Route::get( '/succes',function(){
    return view('succes');
});

Route::get('/cautare', 'BookController@search')->name('cautare');;

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
    Route::get('/test', function (){
        return PriceController::getPrice(3);
    });
    Route::get('/testCorrect/{basePrice}/{region}/{age}/{category}', function ($basePrice, $region, $age, $category){
        $controller = new CostController();
        return $controller->finalPrice($basePrice, $region, $age, $category);
    });
    Route::get('/getFinalPrice/{basePrice}/{region}/{age}/{category}', function ($basePrice, $region, $age, $category){
       $controller = new CostController();
       return $controller->finalPrice($basePrice, $region, $age, $category);
    });
});

Route::get('/home/{id}', function($id){
   return "User:".$id;
});

Auth::routes();
Route::get('/register', 'RegionController@index')->name('register');


Auth::routes();
Route::get('/reports', 'DownloadReportsController@reports')->name('reports');


Auth::routes();
Route::get('/test', 'DownloadReportsController@test')->name('test');

Auth::routes();
Route::get('/approve_users', 'ApproveUsersController@index')->name('approve_users');
