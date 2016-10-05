<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Tiedot;

class NuuskaApiController extends Controller
{
    public function haeNimellä(Request $request) {
        $haku = $request->input('value');
        $values = Nuuska::where('nimi', '=', $haku)->first();
       // http://localhost/NuuskaApi/public/index.php/api/json/nuuska?value=3

        return Response::json($values);
        }

    public function haeId(Request $request) {
        $haku = $request->input('value');
        $values = Nuuska::where('nuuska_id', '=', $haku)->first();
        // http://localhost/NuuskaApi/public/index.php/api/json/id?value=3

        return Response::json($values);
    }

    public function haeValmistaja(Request $request) {
        $haku = $request->input('value');
        $values = Tiedot::where('valmistaja', '=', $haku)->get();
       // $values2 = Nuuska::find($values)
        // localhost/NuuskaApi/public/index.php/api/json/nuuska/valmistaja?value=

        return Response::json($values);
    }

    public function lisaaNuuska(Request $request) {
        $haku = $request->input('nimi');
        $haku2 = $request->input('tyyppi');
        // http://localhost/NuuskaApi/public/index.php/api/json/lisää?nimi=xxx&tyyppi=yyy
        $muuttuja = array($haku,$haku2);
        Nuuska::create($muuttuja);
    }
}
