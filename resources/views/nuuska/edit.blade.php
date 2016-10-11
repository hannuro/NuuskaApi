@extends('layouts/template')
@section('content')

    @include('includes.message-block')
    <h1>Päivitä nuuskan tiedot</h1>
    @foreach($tiedot as $tieto)
        @foreach($nuuskat as $nuuska)
            @foreach($hinnat as $hinta)
    {!! Form::model($nuuska,['method' => 'PATCH','route'=>['nuuska.update',$nuuska->nuuska_id]]) !!}
    <div class="form-group">
        {!! Form::label('Nimi', 'Nimi:') !!}
        {!! Form::text('nimi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tyyppi', 'Tyyppi (Pussi / Tykki):') !!}
        {!! Form::text('tyyppi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nikotiinipitoisuus', 'Nikotiinipitoisuus (mg):') !!}
        {!! Form::text('nikotiinipitoisuus',$tieto->nikotiinipitoisuus,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Pakkauskoko', 'Pakkauskoko (esim 10x20g):') !!}
        {!! Form::text('pakkauskoko',$tieto->pakkauskoko,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Valmistaja', 'Valmistaja:') !!}
        {!! Form::text('valmistaja',$tieto->valmistaja,['class'=>'form-control']) !!}
    </div>
    <div><h2>Hintatiedot euroina</h2></div>
    <div class="form-group">
        {!! Form::label('Nuuskakaira', 'Nuuskakaira:') !!}
        {!! Form::text('nuuskakaira',$hinta->nuuskakaira,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nuuskakenraali', 'Nuuskakenraali:') !!}
        {!! Form::text('nuuskakenraali',$hinta->nuuskakenraali,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Muu', 'Muu:') !!}
        {!! Form::text('muu',$hinta->muu,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Päivitä', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="{{ url('/api/nuuska')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
            @endforeach
        @endforeach
    @endforeach
@stop
