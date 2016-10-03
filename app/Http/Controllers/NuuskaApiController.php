<?php

namespace App\Http\Controllers;

use App\Models\Nuuska;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class NuuskaApiController extends Controller
{
    public function nimiLista(Request $request) {
        $haku_nimi = $request->input('nimi');

        $values = Nuuska::all();

        return Response::json($values);
        }
}
