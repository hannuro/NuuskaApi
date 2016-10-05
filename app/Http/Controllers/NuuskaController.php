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
       // $request->all();
        $nuuska = $request->only('nimi', 'tyyppi');
        Nuuska::create($nuuska);
        $tieto_nuuska_id = Nuuska::find($nuuska)->get('nuuska_id');
        $tiedot = $request->only('nikotiinipitoisuus', 'pakkauskoko', 'valmistaja');
        array_push($tiedot, $tieto_nuuska_id[0]);
        Tiedot::create($tiedot);
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
    public function edit($id)
    {
        $nuuska=Nuuska::find($id);
        return view('nuuska.edit',compact('nuuska'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //
        $nuuskaUpdate= $request->all();
        $nuuska=Nuuska::find($id);
        $nuuska->update($nuuskaUpdate);
        return redirect('api/nuuska');
    }






}
