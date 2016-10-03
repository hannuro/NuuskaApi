<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;

use App\Http\Requests;

class NuuskaController extends Controller

{
    var $nuuska;

    public function __construct() {
        $this->nuuska = Nuuska::all(array('nimi'));

    }
    public function index() {
        return view('page', array('nuuska' => $this->nuuska));

    }

}
