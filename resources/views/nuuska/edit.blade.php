@extends('layouts/template')
@section('content')
    <h1>Päivitä nuuskan tiedot</h1>
    {!! Form::model($nuuska,['method' => 'PATCH','route'=>['nuuska.update',$nuuska->nuuska_id]]) !!}
    <div class="form-group">
        {!! Form::label('Nimi', 'Nimi:') !!}
        {!! Form::text('nimi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tyyppi', 'Tyyppi:') !!}
        {!! Form::text('tyyppi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nikotiinipitoisuus', 'Nikotiinipitoisuus:') !!}
        {!! Form::text('nikotiinipitoisuus',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Pakkauskoko', 'Pakkauskoko:') !!}
        {!! Form::text('pakkauskoko',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Valmistaja', 'Valmistaja:') !!}
        {!! Form::text('valmistaja',null,['class'=>'form-control']) !!}
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
@stop
