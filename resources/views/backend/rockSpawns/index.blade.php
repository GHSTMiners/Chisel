@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Rock spawns</h1>
                <a type="button" href="{{ route('rock-spawns.create') }}" class="btn btn-primary btn-lg">Add spawn</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Rock</th>
                <th scope="col">Starting layer</th>
                <th scope="col">Ending layer</th>
                <th scope="col">Spawn rate</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rockSpawns as $currentSpawn)
            <tr class="clickable-row" data-href="{{route('rock-spawns.edit', $currentSpawn->id)}}">
                <th scope="row">{{$currentSpawn->id}}</th>
                <td>{{$currentSpawn->rock->name}}</td>
                <td>{{$currentSpawn->starting_layer}}</td>
                <td>{{$currentSpawn->ending_layer}}</td>
                <td>{{$currentSpawn->spawn_rate}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
