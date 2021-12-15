@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                        <h4 class="card-title">{{ __('Edit spawn') }}</h4>   
                        <form method="POST" action="{{ route('rock-spawns.destroy', [$rockSpawn->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="d-flex form-group justify-content-end">
                                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                            </div>
                        </form>
                        </div>
                        <form method="POST" action="{{ route('rock-spawns.update', $rockSpawn->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for="price" class="form-label">{{ __('Rock') }}</label>
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="rock_id" name="rock_id">
                                @foreach ($rocks as $currentRock)
                                    <option value="{{$currentRock->id}}" @if($rockSpawn->rock_id == $currentRock->id) selected @endif >{{$currentRock->name}}  </option>
                                    
                                @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="starting_layer" class="form-label">{{ __('Starting layer') }}</label>
                                <input id="starting_layer" placeholder="0" step="1" type="number" class="form-control @error('starting_layer') is-invalid @enderror" name="starting_layer" value="{{ old('starting_layer') ?? $rockSpawn->starting_layer }}" required autocomplete="name" autofocus>
                                @error('starting_layer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ending_layer" class="form-label">{{ __('Ending layer') }}</label>
                                <input id="ending_layer" placeholder="100" step="1" type="number" class="form-control @error('ending_layer') is-invalid @enderror" name="ending_layer" value="{{ old('ending_layer') ?? $rockSpawn->ending_layer }}" required autocomplete="name" autofocus>
                                @error('ending_layer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="spawn_rate" class="form-label">{{ __('Spawn rate') }}</label>
                                <input id="spawn_rate" inputmode="decimal" placeholder="0.5000" type="number" step=0.0001 class="form-control @error('spawn_rate') is-invalid @enderror" name="spawn_rate" value="{{ old('spawn_rate') ?? $rockSpawn->spawn_rate }}" required autocomplete="name" autofocus aria-describedby="basic-addon1">
                                @error('spawn_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
