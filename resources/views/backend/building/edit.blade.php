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
                            <div class="mb-3">
                                <label for="video" class="form-label">{{ __('Video') }}</label>
                                <input id="video" name="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" accept="video/webm">
                                @error('video')
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
