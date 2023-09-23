@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Backgrounds</h1>
                <a type="button" href="{{ route('background.create') }}" class="btn btn-primary btn-lg">Add background 🖼️</a>
            </div>
        <div class="row">
        @foreach ($backgrounds as $currentBackground)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentBackground->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row pb-3">
                                <p class="card-text">Starting layer: {{$currentBackground->starting_layer}}</p>
                                <p class="card-text text-truncate">Ending layer: {{$currentBackground->ending_layer}}</p>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('background.edit', $currentBackground->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('background.destroy', [$currentBackground->id]) }}">
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
