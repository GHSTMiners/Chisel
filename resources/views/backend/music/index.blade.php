@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Music</h1>
                <a type="button" href="{{ route('music.create') }}" class="btn btn-primary btn-lg">Add music 🎵</a>
            </div>
        <div class="row">
        @foreach ($music as $currentMusic)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row pb-3">
                                <h3 class="card-title">{{$currentMusic->name}}</h3>
                                <audio controls>
                                    <source src="/storage/{{$currentMusic->audio}}">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('music.edit', $currentMusic->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('music.destroy', [$currentMusic->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="d-flex form-group justify-content-end">
                                                <input type="submit" class="btn btn-danger delete-music" value="Delete">
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
