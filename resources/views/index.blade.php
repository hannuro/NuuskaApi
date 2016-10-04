@extends('layout/template')

@section('content')
    <h1>NuuskaApi</h1>
    <a href="{{url('/nuuska/create')}}" class="btn btn-success">Lisää Nuuska</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Nimi</th>
            <th>Tyyppi</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($nuuskat as $nuuska)
            <tr>
                <td>{{ $nuuska->id }}</td>
                <td>{{ $nuuska->isbn }}</td>
                <td>{{ $nuuska->title }}</td>
                <td><a href="{{url('nuuska',$nuuska->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('nuuska.edit',$nuuska->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['nuuska.destroy', $nuuska->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection