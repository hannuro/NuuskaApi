@extends('layouts/template')
@section('content')
    <h1>Nuuskan tiedot</h1>
    @foreach($tiedot as $tieto)
    <form class="form-horizontal">
        <div class="form-group">
            <label for="tieto_id" class="col-sm-2 control-label">Tieto_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tieto_id" placeholder={{$tieto->tieto_id}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="nikotiinipitoisuus" class="col-sm-2 control-label">Nikotiinipitoisuus</label>
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

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('/api/nuuska')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
    $@endforeach
@stop