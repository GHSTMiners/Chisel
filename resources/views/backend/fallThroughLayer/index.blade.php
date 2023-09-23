@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Fallthrough layers</h1>
                <a type="button" href="{{ route('fall-through.create') }}" class="btn btn-primary btn-lg">Add fallthrough layer</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Layer</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($fallThroughLayers as $currentFallThroughLayer)
            <tr class="clickable-row" data-href="{{route('fall-through.edit', $currentFallThroughLayer->id)}}">
                <th scope="row">{{$currentFallThroughLayer->id}}</th>
                <td>{{$currentFallThroughLayer->layer}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
