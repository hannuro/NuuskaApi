<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/json/nuuska/nimi', 'NuuskaApiController@haeNimellä');
// localhost/NuuskaApi/public/index.php/api/json/nuuska/nimi?nimi=

Route::get('/json/nuuska/id', 'NuuskaApiController@haeId');
// localhost/NuuskaApi/public/index.php/api/json/nuuska/id?id=

Route::get('/json/nuuska/valmistaja', 'NuuskaApiController@haeValmistaja');
// localhost/NuuskaApi/public/index.php/api/json/nuuska/valmistaja?valmistaja=

Route::post('/json/nuuska/lisää', 'NuuskaApiController@lisääNuuska');
// localhost/NuuskaApi/public/index.php/api/json/nuuska/nimi?nimi=


Route::resource('nuuska','NuuskaController');
Route::resource('tiedot','NuuskaController');

