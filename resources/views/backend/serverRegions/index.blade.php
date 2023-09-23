@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Server Regions</h1>
                <a type="button" href="{{ route('server-regions.create') }}" class="btn btn-primary btn-lg">Add server region 🖥️</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">URL</th>
                <th scope="col">Longitude</th>
                <th scope="col">Latitude</th>
                <th scope="col">flag</th>
                <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($regions as $currentRegion)
            <tr class="clickable-row" data-href="{{route('server-regions.edit', $currentRegion->id)}}">
                <th scope="row">{{$currentRegion->id}}</th>
                <td>{{$currentRegion->name}}</td>
                <td>{{$currentRegion->url}}</td>
                <td>{{$currentRegion->longitude}}</td>
                <td>{{$currentRegion->latitude}}</td>
                <td>{{$currentRegion->flag}}</td>
                <td>{{$currentRegion->active ? 'True' : 'False'}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
