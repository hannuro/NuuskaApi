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
        {!! Form::submit('Päivitä', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
