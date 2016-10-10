<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Models;

Route::get('/', function () {
    return view('welcome');
});

Route::get('nuuska/{id}', function($id){
    $nuuska = App\Models\Nuuska::find($id);
    echo $nuuska;
});

Route::get('/insert', function () {
    Nuuska::create(['nimi' => 'Vittu saatana', 'tyyppi' => 'lollero']);
    return "Nuuska has been created!";
});

Route::get('/test','NuuskaController@index');

