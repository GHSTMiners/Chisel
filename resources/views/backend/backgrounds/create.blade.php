@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('background.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add background') }}</h4>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('Image') }}</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="starting_layer" class="form-label">{{ __('Starting layer') }}</label>
                                <input id="starting_layer" placeholder="0" step="1" type="number" class="form-control @error('starting_layer') is-invalid @enderror" name="starting_layer" value="{{ old('starting_layer') }}" required autocomplete="name" autofocus>
                                @error('starting_layer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ending_layer" class="form-label">{{ __('Ending layer') }}</label>
                                <input id="ending_layer" placeholder="100" step="1" type="number" class="form-control @error('ending_layer') is-invalid @enderror" name="ending_layer" value="{{ old('ending_layer') }}" required autocomplete="name" autofocus>
                                @error('ending_layer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
