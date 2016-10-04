@extends('layouts/template')

@section('content')
    <div>
        <img src="http://localhost/nuuskaapi/public/images/nuuskalogo.png">
    </div>
    <a href="{{url('api/nuuska/create')}}" class="btn btn-success">Lisää Nuuska</a>
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
        @foreach ($nuuska as $nutu)
            <tr>
                <td>{{ $nutu->nuuska_id }}</td>
                <td>{{ $nutu->nimi }}</td>
                <td>{{ $nutu->tyyppi }}</td>
                <td><a href="{{url('api/tiedot',$nutu->nuuska_id)}}" class="btn btn-primary">Tiedot</a></td>
                <td><a href="{{route('nuuska.edit',$nutu->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['nuuska.destroy', $nutu->nuuska_id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection