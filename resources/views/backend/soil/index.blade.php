@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Soil</h1>
                <a type="button" href="{{ route('soil.create') }}" class="btn btn-primary btn-lg">Add soil 🌱</a>
            </div>

            <table class="table table-sortable table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Layers</th>
                        <th scope="col">Dig multiplier</th>
                        <th scope="col">Top image</th>
                        <th scope="col">Middle image</th>
                        <th scope="col">Bottom image</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($soil as $currentSoil)
                    <tr dragable="true" class="clickable-row" style="display: table-row;" data-href="{{route('soil.edit', $currentSoil->id)}}">
                        <td scope="row">{{$currentSoil->id}}</td>
                        <td>{{$currentSoil->name}}</td>
                        <td>{{$currentSoil->layers}}</td>
                        <td>{{$currentSoil->dig_multiplier}}</td>
                        <td><img class="soil-table-image" src="{{"/storage/".$currentSoil->top_image}}" class="mx-auto d-block" alt="..."></td>
                        <td><img class="soil-table-image" src="{{"/storage/".$currentSoil->middle_image}}" class="mx-auto d-block" alt="..."></td>
                        <td><img class="soil-table-image" src="{{"/storage/".$currentSoil->bottom_image}}" class="mx-auto d-block" alt="..."></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

@endsection
