@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Consumables</h1>
                <a type="button" href="{{ route('consumable.create') }}" class="btn btn-primary btn-lg">Add consumable ⚗️</a>
            </div>
        <div class="row">
        @foreach ($consumables as $currentConsumable)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentConsumable->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-8">
                                    <h3 class="card-title">{{$currentConsumable->name}}</h3>
                                    <p class="card-text">Price: {{$currentConsumable->price}}</p>
                                </div>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('consumable.edit', $currentConsumable->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('consumable.destroy', [$currentConsumable->id]) }}">
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
