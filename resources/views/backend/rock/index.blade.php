@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Rock</h1>
                <a type="button" href="{{ route('rock.create') }}" class="btn btn-primary btn-lg">Add rock 🪨</a>
            </div>
        <div class="row">
        @foreach ($rocks as $currentRock)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentRock->image}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h3 class="card-title">{{$currentRock->name}}</h3>
                            <p class="card-text">
                                Digable: 
                                @if($currentRock->digable) 
                                    <i class="bi bi-check-lg"></i> 
                                @else
                                    <i class="bi bi-x-lg"></i>
                                @endif
                            </p>
                            <p class="card-text">Explodable: 
                                @if($currentRock->explodeable) 
                                    <i class="bi bi-check-lg"></i> 
                                @else
                                    <i class="bi bi-x-lg"></i>
                                @endif
                            </p>
                            <p class="card-text">Lava: 
                                @if($currentRock->lava) 
                                    <i class="bi bi-check-lg"></i> 
                                @else
                                    <i class="bi bi-x-lg"></i>
                                @endif
                            </p>
                            

                                <div class="row">

                                <div class="col">
                                    <a href="{{route('rock.edit', $currentRock->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <form method="POST" action="{{ route('rock.destroy', [$currentRock->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}                                    
                                        <div class="d-flex form-group justify-content-end">
                                            <input type="submit" class="btn btn-danger ml-auto" value="Delete">
                                        </div>
                                    </form>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
