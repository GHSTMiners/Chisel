@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Puzzles</h1>
                <a type="button" href="{{ route('puzzle.create') }}" class="btn btn-primary btn-lg">Add puzzle 🧩</a>
            </div>
        <div class="row">
        @foreach ($puzzles as $currentPuzzle)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-8">
                                    <h3 class="card-title">{{$currentPuzzle->name}}</h3>
                                </div>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('puzzle.edit', $currentPuzzle->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('puzzle.destroy', [$currentPuzzle->id]) }}">
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
