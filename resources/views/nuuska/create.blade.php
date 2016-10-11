@extends('layouts/template')
@section('content')
    @include('includes.message-block')
    <h1>Lisää nuuska</h1>



    {!! Form::open(['url' => 'api/nuuska']) !!}
    <div class="form-group">
        {!! Form::label('Nimi', 'Nimi:') !!}
        {!! Form::text('nimi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tyyppi', 'Tyyppi (Pussi / Tykki):') !!}
        {!! Form::text('tyyppi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nikotiinipitoisuus (mg)', 'Nikotiinipitoisuus (mg):') !!}
        {!! Form::text('nikotiinipitoisuus',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Pakkauskoko', 'Pakkauskoko (esim 10x20g):') !!}
        {!! Form::text('pakkauskoko',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Valmistaja', 'Valmistaja:') !!}
        {!! Form::text('valmistaja',null,['class'=>'form-control']) !!}
    </div>
    <div><h2>Hintatiedot euroina</h2></div>
    <div class="form-group">
        {!! Form::label('Nuuskakaira', 'Nuuskakaira:') !!}
        {!! Form::text('nuuskakaira',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nuuskakenraali', 'Nuuskakenraali:') !!}
        {!! Form::text('nuuskakenraali',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Muu', 'Muu:') !!}
        {!! Form::text('muu',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    <div id="info"></div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="{{ url('/api/nuuska')}}" class="btn btn-primary">Back</a>
        </div>
    </div>


@stop
