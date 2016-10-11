<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use App\Models\Hinta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Tiedot;

class NuuskaApiController extends Controller
{
    public function haeNimellä(Request $request) {
        $haku = $request->input('value');
        $values = Nuuska::where('nimi', '=', $haku)->get();
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

        for($i = 0; $i < count($values);$i ++){
            $output[$i] = Nuuska::find($values[$i]['tieto_nuuska_id']);
        }

        return Response::json($output);
    }

    /*
    public function lisääNuuska(Request $request) {
        $haku = $request->input('nimi');
        $haku2 = $request->input('tyyppi');
        // http://localhost/NuuskaApi/public/index.php/api/json/lisää?nimi=xxx&tyyppi=yyy
        $muuttuja = array($haku,$haku2);
        Nuuska::create($muuttuja);
    }*/

    public function haeTyyppi(Request $request) {
        $haku = $request->input('value');
        $values = Nuuska::where('tyyppi', '=', $haku)->get();

        // localhost/NuuskaApi/public/api/json/nuuska/tyyppi?value=
        return Response::json($values);
    }

    public function haeVahvuus(Request $request) {
        $haku = $request->input('value');
        $values = Tiedot::where('nikotiinipitoisuus', '=', $haku)->get();

        for($i = 0; $i < count($values);$i ++){
            $output[$i] = Nuuska::find($values[$i]['tieto_nuuska_id']);
        }

        // localhost/NuuskaApi/public/api/json/nuuska/vahvuus?value=
        return Response::json($output);
    }

    public function haePorauksella(Request $request) {
        $haku = $request->input('value');

        $output = null;
        $values = null;

        if($haku == "mieto"){
            $values = Tiedot::where('nikotiinipitoisuus', '<', 9)->get();
        }
        else if($haku == "keskivahva"){
            $values = Tiedot::whereBetween('nikotiinipitoisuus', array(10, 19))->get();
        }
        else if($haku == "vahva"){
            $values = Tiedot::where('nikotiinipitoisuus', '>', 19)->get();
        }


        for($i = 0; $i < count($values);$i ++){
            $output[$i] = Nuuska::find($values[$i]['tieto_nuuska_id']);
        }

        // localhost/NuuskaApi/public/api/json/nuuska/vahvuus?value=
        return Response::json($output);
    }

    public function haeValikoima(Request $request) {
        $haku = $request->input('value');

        $tiedot = null;
        $hinnat = null;
        $nuuska = null;
        $tiimi = null;

        if($haku == "nuuskakaira"){
            $hinnat = Hinta::where('nuuskakaira', '>', 0)->get();
            for($i = 0; $i < count($hinnat);$i ++){
                $nuuska[$i] = Nuuska::find($hinnat[$i]['hinta_nuuska_id']);
                $tiedot[$i] = Tiedot::where('tieto_nuuska_id', '=', $hinnat[$i]['hinta_nuuska_id'])->first();
            }



            for($i = 0; $i < count($hinnat); $i++){
                $tiimi[$i]['nuuska_id'] = $nuuska[$i]['nuuska_id'];
                $tiimi[$i]['nimi'] = $nuuska[$i]['nimi'];
                $tiimi[$i]['tyyppi'] = $nuuska[$i]['tyyppi'];

                $tiimi[$i]['nikotiinipitoisuus'] = $tiedot[$i]['nikotiinipitoisuus'];
                $tiimi[$i]['pakkauskoko'] = $tiedot[$i]['pakkauskoko'];
                $tiimi[$i]['valmistaja'] = $tiedot[$i]['valmistaja'];

                $tiimi[$i]['nuuskakaira'] = $hinnat[$i]['nuuskakaira'];
                $tiimi[$i]['nuuskakenraali'] = $hinnat[$i]['nuuskakenraali'];
            }

        }
        else if($haku == "nuuskakenraali"){
            $hinnat = Hinta::where('nuuskakenraali', '>', 0)->get();
            for($i = 0; $i < count($hinnat);$i ++){
                $nuuska[$i] = Nuuska::find($hinnat[$i]['hinta_nuuska_id']);
                $tiedot[$i] = Tiedot::where('tieto_nuuska_id', '=', $hinnat[$i]['hinta_nuuska_id'])->first();
            }



            for($i = 0; $i < count($hinnat); $i++){
                $tiimi[$i]['nuuska_id'] = $nuuska[$i]['nuuska_id'];
                $tiimi[$i]['nimi'] = $nuuska[$i]['nimi'];
                $tiimi[$i]['tyyppi'] = $nuuska[$i]['tyyppi'];

                $tiimi[$i]['nikotiinipitoisuus'] = $tiedot[$i]['nikotiinipitoisuus'];
                $tiimi[$i]['pakkauskoko'] = $tiedot[$i]['pakkauskoko'];
                $tiimi[$i]['valmistaja'] = $tiedot[$i]['valmistaja'];

                $tiimi[$i]['nuuskakaira'] = $hinnat[$i]['nuuskakaira'];
                $tiimi[$i]['nuuskakenraali'] = $hinnat[$i]['nuuskakenraali'];
            }

        }

        // localhost/NuuskaApi/public/api/json/nuuska/valikoima?value=
        return Response::json($tiimi);
    }

    public function haeKaikki()
    {
        $tiedot = null;
        $hinnat = null;
        $nuuska = null;
        $tiimi = null;

        $nuuska = Nuuska::all();


            for ($i = 0; $i < count($nuuska); $i++) {
                $hinnat[$i] = Hinta::where('hinta_nuuska_id', '=', $nuuska[$i]['nuuska_id'])->first();
                $tiedot[$i] = Tiedot::where('tieto_nuuska_id', '=', $nuuska[$i]['nuuska_id'])->first();

            }

            for ($i = 0; $i < count($nuuska); $i++) {

                $tiimi[$i]['nuuska_id'] = $nuuska[$i]['nuuska_id'];
                $tiimi[$i]['nimi'] = $nuuska[$i]['nimi'];
                $tiimi[$i]['tyyppi'] = $nuuska[$i]['tyyppi'];

                $tiimi[$i]['nikotiinipitoisuus'] = $tiedot[$i]['nikotiinipitoisuus'];
                $tiimi[$i]['pakkauskoko'] = $tiedot[$i]['pakkauskoko'];
                $tiimi[$i]['valmistaja'] = $tiedot[$i]['valmistaja'];

                $tiimi[$i]['nuuskakaira'] = $hinnat[$i]['nuuskakaira'];
                $tiimi[$i]['nuuskakenraali'] = $hinnat[$i]['nuuskakenraali'];

            }

                return Response::json($tiimi);
        }



}
