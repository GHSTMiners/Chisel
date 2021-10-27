@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Vitals</h1>
                <a type="button" href="{{ route('vital.create') }}" class="btn btn-primary btn-lg">Add vital ❤️</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Minimum</th>
                <th scope="col">Maximum</th>
                <th scope="col">Initial</th>
                <th scope="col">Default</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($vitals as $currentVital)
            <tr class="clickable-row" data-href="{{route('vital.edit', $currentVital->id)}}">
                <th scope="row">{{$currentVital->id}}</th>
                <td>{{$currentVital->name}}</td>
                <td>{{$currentVital->minimum}}</td>
                <td>{{$currentVital->maximum}}</td>
                <td>{{$currentVital->initial}}</td>
                <td>{{$currentVital->default ? 'True' : 'False'}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
