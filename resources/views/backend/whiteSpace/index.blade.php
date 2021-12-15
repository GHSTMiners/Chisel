@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Whitespaces</h1>
                <a type="button" href="{{ route('whitespace.create') }}" class="btn btn-primary btn-lg">Add whitespace 🤹</a>
            </div>
            <table class="table table-striped table-bordered table-hover">

            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Starting layer</th>
                    <th scope="col">Ending layer</th>
                    <th scope="col">Spawn rate</th>
                    <th scope="col">Background only</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($whiteSpaces as $currentWhiteSpace)
                <tr class="clickable-row" data-href="{{route('whitespace.edit', $currentWhiteSpace->id)}}">
                    <th scope="row">{{$currentWhiteSpace->id}}</th>
                    <td>{{$currentWhiteSpace->starting_layer}}</td>
                    <td>{{$currentWhiteSpace->ending_layer}}</td>
                    <td>{{$currentWhiteSpace->spawn_rate}}</td>
                    <td>{{$currentWhiteSpace->background_only}}</td>
                </tr>
            @endforeach
            </tbody>
            </table>

    </div>

@endsection
