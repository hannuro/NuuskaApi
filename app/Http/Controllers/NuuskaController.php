<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;
use App\Models\Tiedot;

use App\Http\Requests;

class NuuskaController extends Controller

{
    var $nuuska;
    var $tiedot;

    public function __construct() {
        $this->nuuska = Nuuska::all(array('nimi'));
        $this->tiedot = Tiedot::all(array('tieto_nuuska_id'));
    }
   /* public function index() {
        return view('page', array('nuuska' => $this->nuuska));

    }
   */
    public function index()
    {
        //
        $nuuska=Nuuska::all();
        return view('nuuska.index',compact('nuuska'));
    }

    public function create(){
        return view('nuuska.create');
    }

    public function store(Request $request){
        $nuuska = $request->all();
        Nuuska::create($nuuska);
        return redirect('api/nuuska');
    }


     public function destroy($id){
        Nuuska::find($id)->delete();
        return redirect('api/nuuska');
    }

    public function show($id)
    {
        $tiedot=Tiedot::where('tieto_nuuska_id', '=', $id)->get();
        return view('nuuska.show',compact('tiedot'));
    }






}
