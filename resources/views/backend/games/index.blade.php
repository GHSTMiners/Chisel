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
                <th scope="col">Score</th>
                <th scope="col">Event</th>
                <th scope="col">IP Address</th>
                <th scope="col">Gotchi</th>
                <th scope="col">Wallet</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($games as $currentGame)
            <tr>
                <th scope="row">{{$currentLog->id}}</th>
                <td>{{$currentLog->score}}</td>
                <td>{{$currentLog->event}}</td>
                <td>{{$currentLog->ipAddress->ip}}</td>
                <td>{{$currentLog->gotchi ? $currentLog->gotchi->gotchi_id : null}}</td>
                <td>{{$currentLog->wallet ? $currentLog->wallet->address : null}}</td>
                <td>{{$currentLog->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
