@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('building.update', [$building->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <h4 class="card-title">{{ __('Edit building') }}</h4>

                            <label for="type" class="form-label">{{ __('Type') }}</label>
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="type" name="type">
                                    <option value="Fuel" @if($building->type == "Fuel") selected @endif>Fuel</option>
                                    <option value="Garage" @if($building->type == "Garage") selected @endif>Garage</option>
                                    <option value="Refinery" @if($building->type == "Refinery") selected @endif>Refinery</option>
                                    <option value="Bazaar" @if($building->type == "Bazaar") selected @endif>Bazaar</option>
                                    <option value="Portal" @if($building->type == "Portal") selected @endif>Portal</option>
                                </select>
                            </div>
                            @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="name" class="form-label">{{ __('Location') }}</label>
                            <div class=" input-group mb-3">
                                <span class="input-group-text">Block X</span>
                                <input id="spawn_x" name="spawn_x" step="any" type="number" value="{{ old('spawn_x') ?? $building->spawn_x }}" class="form-control" placeholder="0" required aria-label="spawn_x">
                                @error('spawn_x')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-text">Block Y</span>
                                <input id="spawn_y" name="spawn_y" step="any" type="number" value="{{ old('spawn_y') ?? $building->spawn_y }}" class="form-control" placeholder="0" required aria-label="spawn_y">
                                @error('spawn_y')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <div class="input-group mb-3">
                                <input id="price" type="text" class="form-control" placeholder="0.00" aria-label="price" name="price" value="{{ old('price') ?? $building->price}}" required>
                                <select class="form-select" aria-label="crypto" name="crypto_id">
                                @foreach ($crypto as $currentCrypto)
                                    <option value="{{$currentCrypto->id}}" @if( $building->crypto_id == $currentCrypto->id) selected @endif >{{$currentCrypto->name}}</option>
                                    
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="activation_message" class="form-label">{{ __('Message') }}</label>
                                <input id="activation_message" type="text" class="form-control @error('activation_message') is-invalid @enderror" name="activation_message" value="{{ old('activation_message') ?? $building->activation_message }}" required autofocus></input>
                                @error('activation_message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label">{{ __('Video') }}</label>
                                <input id="video" name="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" accept="video/webm">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="activation_sound" class="form-label">{{ __('Activation sound') }}</label>
                                <input id="activation_sound" type="file" class="form-control @error('activation_sound') is-invalid @enderror" name="activation_sound" value="{{ old('activation_sound') }}" autocomplete="activation_sound">
                                @error('activation_sound')
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
