@extends('backend.layouts.app')
@section('content')

    <div class="container">
        <div class="d-flex justify-content-between pb-3">
            <h1>Games</h1>
        </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Game ID</th>
                <th scope="col">World</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($games as $currentGame)
            <tr>
                <th scope="row">{{$currentGame->id}}</th>
                <td>{{$currentGame->room_id}}</td>
                <td>{{$currentGame->world->name}}</td>
                <td>{{$currentGame->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
