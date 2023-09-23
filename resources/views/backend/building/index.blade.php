@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Buildings</h1>
                <a type="button" href="{{ route('building.create') }}" class="btn btn-primary btn-lg">Add building 🏢</a>
            </div>
        <div class="row">
        @foreach ($buildings as $currentBuilding)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <video loop autoplay muted>
                            <source  src="{{"/storage/".$currentBuilding->video}}" type="video/webm">
                        </video>
                        <div class="card-body">
                            <div class="row pb-3">
                                <h3 class="card-title">{{$currentBuilding->type}}</h3>
                                <p class="card-text">X: {{$currentBuilding->spawn_x}}, Y: {{$currentBuilding->spawn_y}}</p>
                            </div>

                                <div class="row">
                                <div class="col">
                                    <a href="{{route('building.edit', $currentBuilding->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('building.destroy', [$currentBuilding->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="d-flex form-group justify-content-end">
                                                <input type="submit" class="btn btn-danger delete-crypto" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
