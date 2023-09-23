@extends('backend.layouts.app')
@section('content')

    <div class="container">
        <div class="d-flex justify-content-between pb-3">
            <h1>Upgrades</h1>
            <a type="button" href="{{ route('upgrade.create') }}" class="btn btn-primary btn-lg">Add upgrade 🆙</a>

        </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($upgrades as $currentUpgrade)
            <tr class="clickable-row" data-href="{{route('upgrade.edit', $currentUpgrade->id)}}">
                <th scope="row">{{$currentUpgrade->id}}</th>
                <td>{{$currentUpgrade->name}}</td>
                <td>{{$currentUpgrade->description}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
