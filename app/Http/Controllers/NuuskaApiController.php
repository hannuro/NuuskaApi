<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class NuuskaApiController extends Controller
{
    public function haeNimellä(Request $request) {
        $haku = $request->input('nimi');
        $values = Nuuska::where('nimi', '=', $haku)->first();
       // http://localhost/NuuskaApi/public/index.php/api/json/nuuska?id=3

        return Response::json($values);
        }

    public function haeId(Request $request) {
        $haku = $request->input('id');
        $values = Nuuska::where('nuuska_id', '=', $haku)->first();
        // http://localhost/NuuskaApi/public/index.php/api/json/nuuska?id=3

        return Response::json($values);
    }
}
