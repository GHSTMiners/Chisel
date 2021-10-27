@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Soil</h1>
                <a type="button" href="{{ route('soil.create') }}" class="btn btn-primary btn-lg">Add soil 🌱</a>
            </div>
        <div class="row">
        @foreach ($soil as $currentSoil)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentSoil->top_image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{$currentSoil->name}}</h3>
                            <p class="card-text">Dig multiplier: {{$currentSoil->dig_multiplier}}</p>

                                <div class="row">

                                <div class="col">
                                    <a href="{{route('soil.edit', $currentSoil->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('soil.destroy', [$currentSoil->id]) }}">
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
