<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;
use App\Models\Tiedot;
use App\Models\Hinta;

use App\Http\Requests;

class NuuskaController extends Controller

{
    var $nuuska;
    var $tiedot;
    var $hinnat;

    public function __construct() {
        $this->nuuska = Nuuska::all(array('nimi'));
        $this->tiedot = Tiedot::all(array('tieto_nuuska_id'));
        $this->hinnat = Hinta::all(array('hinta_nuuska_id'));
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
        $this->validate($request, [
            'nimi' => 'required|max:50',
            'tyyppi' => 'required|max:50',
            'nikotiinipitoisuus' => 'required|integer|max:50',
            'pakkauskoko' => 'required',
            'valmistaja' => 'required',
            'nuuskakaira' => 'integer',
            'nuuskakenraali' => 'integer',
            'muu' => 'integer',
        ]);
        $nuuska = $request->only('nimi', 'tyyppi');
        $message = "Tapahtui virhe, tarkista tiedot!";
        if (Nuuska::create($nuuska)){
            $message = 'Nuuska luotu!';

        }
        $tieto_nuuska_id = Nuuska::where('nimi', '=', $request->only('nimi'))->get();
        $hinta_nuuska_id = Nuuska::where('nimi', '=', $request->only('nimi'))->get();

        $nuuska_id = "";

        foreach ($tieto_nuuska_id as $item) {//?????????
            $nuuska_id = $item->nuuska_id;
        }

        foreach ($hinta_nuuska_id as $item) {//?????????
            $nuuska_id = $item->nuuska_id;
        }

        $tiedot = $request->only('nikotiinipitoisuus', 'pakkauskoko', 'valmistaja');
        $tiedot['tieto_nuuska_id'] = $nuuska_id;

        $hinnat = $request->only('nuuskakaira', 'nuuskakenraali', 'muu');
        $hinnat['hinta_nuuska_id'] = $nuuska_id;

        Tiedot::create($tiedot);
        Hinta::create($hinnat);
        return redirect('api/nuuska')->with(['message' => $message]);
    }


     public function destroy($id){
        Nuuska::find($id)->delete();
        return redirect('api/nuuska');
    }

    public function show($id)
    {
        $tiedot=Tiedot::where('tieto_nuuska_id', '=', $id)->get();
        $nuuskat=Nuuska::where('nuuska_id', '=', $id)->get();
        $hinnat=Hinta::where('hinta_nuuska_id', '=', $id)->get();
        return view('nuuska.show',compact('tiedot','nuuskat','hinnat'));
    }
    public function edit($id)
    {

        $tiedot=Tiedot::where('tieto_nuuska_id', '=', $id)->get();
        $nuuskat=Nuuska::where('nuuska_id', '=', $id)->get();
        $hinnat=Hinta::where('hinta_nuuska_id', '=', $id)->get();
        return view('nuuska.edit',compact('nuuskat','tiedot','hinnat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nimi' => 'required|max:50',
            'tyyppi' => 'required|max:50',
            'nikotiinipitoisuus' => 'required|integer|max:50',
            'pakkauskoko' => 'required',
            'valmistaja' => 'required',
            'nuuskakaira' => 'integer',
            'nuuskakenraali' => 'integer',
            'muu' => 'integer',
        ]);
        //
        $nuuskaUpdate = $request->only('nimi', 'tyyppi');
        $nuuska=Nuuska::find($id);
        $nuuska->update($nuuskaUpdate);
        $tieto = Tiedot::where('tieto_nuuska_id', '=', $id)->first();
        $tietoUpdate = $request->only('nikotiinipitoisuus', 'pakkauskoko', 'valmistaja');
        $tieto->update($tietoUpdate);
        $hinta = Hinta::where('hinta_nuuska_id', '=', $id)->first();
        $hintaUpdate = $request->only('nuuskakaira', 'nuuskakenraali', 'muu');
        $hinta->update($hintaUpdate);

        return redirect('api/nuuska');
    }






}
