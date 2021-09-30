@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Explosives</h1>
                <a type="button" href="{{ route('explosive.create') }}" class="btn btn-primary btn-lg">Add explosive 💥</a>
            </div>
        <div class="row">
        @foreach ($explosives as $currentExplosive)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentExplosive->soil_image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row pb-3">
                                <h3 class="card-title">{{$currentExplosive->name}}</h3>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('explosive.edit', $currentExplosive->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('explosive.destroy', [$currentExplosive->id]) }}">
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
