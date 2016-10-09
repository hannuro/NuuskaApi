@extends('layouts/template')
@section('content')
    <h1>Nuuskan tiedot</h1>
    @foreach($tiedot as $tieto)
        @foreach($nuuskat as $nuuska)
            @foreach($hinnat as $hinta)
    <form class="form-horizontal">

        <div class="form-group">
            <label for="nimi" class="col-sm-2 control-label">Nimi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nimi" placeholder={{$nuuska->nimi}} readonly>
                </div>
        </div>
        <div class="form-group">
                <label for="tyyppi" class="col-sm-2 control-label">Tyyppi (Pussi / Lös)</label>
            <div class="col-sm-10">
                    <input type="text" class="form-control" id="tyyppi" placeholder={{$nuuska->tyyppi}} readonly>
                </div>
        </div>
        <div class="form-group">
            <label for="tieto_id" class="col-sm-2 control-label">Tieto_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tieto_id" placeholder={{$tieto->tieto_id}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="nikotiinipitoisuus" class="col-sm-2 control-label">Nikotiinipitoisuus (mg)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nikotiinipitoisuus" placeholder={{$tieto->nikotiinipitoisuus}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="pakkauskoko" class="col-sm-2 control-label">Pakkauskoko</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pakkauskoko" placeholder={{$tieto->pakkauskoko}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="valmistaja" class="col-sm-2 control-label">Valmistaja</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="valmistaja" placeholder={{$tieto->valmistaja}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="tieto_nuuska_id" class="col-sm-2 control-label">Tieto_nuuska_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tieto_nuuska_id" placeholder={{$tieto->tieto_nuuska_id}} readonly>
            </div>
        </div>
        <div><h2>Hintatiedot</h2></div>
        <div class="form-group">
            <label for="nuuskakaira" class="col-sm-2 control-label">Nuuskakaira</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nuuskakaira" placeholder={{$hinta->nuuskakaira}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="nuuskakenraali" class="col-sm-2 control-label">Nuuskakenraali</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nuuskakeisari" placeholder={{$hinta->nuuskakenraali}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="muu" class="col-sm-2 control-label">Muu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="muu" placeholder={{$hinta->muu}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('/api/nuuska')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
    @endforeach
        @endforeach
            @endforeach
@stop