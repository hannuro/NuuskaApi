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
// localhost/NuuskaApi/public/api/json/nuuska/nimi?value=

Route::get('/json/nuuska/id', 'NuuskaApiController@haeId');
// localhost/NuuskaApi/public/api/json/nuuska/id?value=

Route::get('/json/nuuska/valmistaja', 'NuuskaApiController@haeValmistaja');
// localhost/NuuskaApi/public/api/json/nuuska/valmistaja?value=

Route::post('/json/nuuska/lisää', 'NuuskaApiController@lisääNuuska');
// localhost/NuuskaApi/public/api/json/nuuska/lisää?nimi=

Route::resource('nuuska','NuuskaController');
Route::resource('tiedot','NuuskaController');

Route::get('index.php', 'NuuskaController@ohjaa');

