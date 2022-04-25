@extends('backend.layouts.app')
@section('content')

    <div class="container">
        <div class="d-flex justify-content-between pb-3">
            <h1>Upgrades</h1>
        </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($upgrades as $currentUpgrade)
            <tr>
                <th scope="row">{{$currentCategory->id}}</th>
                <td>{{$currentCategory->name}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
