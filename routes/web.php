<?php

use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\MultiplierController;
use App\Http\Controllers\VersionMultiplierController;
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

Route::get('/', 'BookController@index');

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

Route::group(['prefix' => 'version'], function(){
    Route::get('/', function(){
        $versionController = new VersionController();
        return $versionController->index();
    });

    Route::get('/create', function (){
        $versionController = new VersionController();
        return $versionController->create();
    })->name('addV');

    Route::get('/edit', function (){
        $versionController = new VersionController();
        return $versionController->edit(0);
    })->name('updateV');

    Route::post('/', function(){
       $versionController = new VersionController();
       return $versionController->store();
    });

    Route::put('/', function(){
        $versionController = new VersionController();
        return $versionController->update();
    });
    Route::delete('/', function(){
        $versionController = new VersionController();
        $versionController->destroy(0);
    });
});


Route::group(['prefix' => 'multiplier'], function(){
    Route::get('/', function(){
        $multiplierController = new MultiplierController();
        return $multiplierController->index();
    });

    Route::get('/create', function (){
        $multiplierController = new MultiplierController();
        return $multiplierController->create();
    })->name('addM');

    Route::get('/edit', function (){
        $multiplierController = new MultiplierController();
        return $multiplierController->edit(0);
    })->name('updateM');

    Route::post('/', function(){
        $multiplierController = new MultiplierController();
        return $multiplierController->store();
    });
    Route::put('/', function(){
       $multiplierController = new MultiplierController();
       return $multiplierController->update();
    });
    Route::delete('/', function(){
        $multiplierController = new MultiplierController();
        $multiplierController->destroy();
    });
});



Route::group(['prefix' => 'versionMultipliers'], function(){
    Route::get('/', function(){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->index();
    });

    Route::get('/create', function (){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->create();
    })->name('addVM');

    Route::get('/edit', function (){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->edit();
    })->name('updateVM');

    Route::post('/', function(){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->store();
    });
    Route::put('/', function(){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->update();
    });
    Route::delete('/', function(){
        $versionMultipliersController = new VersionMultiplierController();
        return $versionMultipliersController->destroy();
    });
});


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

Route::get('/reports', 'DownloadReportsController@report')->name('report');



Auth::routes();

Route::get('/test', 'DownloadReportsController@test')->name('test');
Auth::routes();

Route::get('/reports', 'DownloadReportsController@reports')->name('reports');



Auth::routes();

Route::get('/test', 'DownloadReportsController@test')->name('test');

Auth::routes();
Route::get('/approve_users', 'ApproveUsersController@index')->name('approve_users');

Auth::routes();
Route::get('/approve', 'ApproveUsersController@approve');

Auth::routes();
Route::get('/view_approve_mail', function() { return new \App\Mail\ApproveMail(); });





Auth::routes();
Route::get('/approve_users', 'ApproveUsersController@index')->name('approve_users');

Auth::routes();
Route::get('/approve', 'ApproveUsersController@approve');

Auth::routes();
Route::get('/view_approve_mail', function() { return new \App\Mail\ApproveMail(); });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/register', 'RegionController@index')->name('register');

Route::post('/register', 'Auth\RegisterController@create')->name('register');
Route::group(['prefix'=>'2fa'], function(){
    Route::get('/','LoginSecurityController@show2faForm');
    Route::post('/generateSecret','LoginSecurityController@generate2faSecret')->name('generate2faSecret');
    Route::post('/enable2fa','LoginSecurityController@enable2fa')->name('enable2fa');
    Route::post('/disable2fa','LoginSecurityController@disable2fa')->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

// test middleware
/*Route::get('/test_middleware', function () {
    return "2FA middleware work!";
})->middleware(['auth', '2fa']);
*/
