@extends('backend.layouts.app')
@section('content')

    <div class="container">
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Score</th>
                <th scope="col">Event</th>
                <th scope="col">IP Address</th>
                <th scope="col">Gotchi</th>
                <th scope="col">Wallet</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($logs as $currentLog)
            <tr>
                <th scope="row">{{$currentLog->id}}</th>
                <td>{{$currentSkill->score}}</td>
                <td>{{$currentSkill->event}}</td>
                <td>{{$currentSkill->ip_address}}</td>
                <td>{{$currentSkill->gotchi}}</td>
                <td>{{$currentSkill->wallet}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
