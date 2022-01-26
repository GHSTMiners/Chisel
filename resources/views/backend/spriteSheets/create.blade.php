@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('sprite-sheets.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add spritesheet') }}</h4>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('Image') }}</label>
                                <input id="image" type="file" class="spritesheet-field form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name" class="form-label">{{ __('Frame size') }}</label>
                            <div class=" input-group mb-3">
                                <span class="input-group-text">Width</span>
                                <input id="frame_width" step="any" type="number" class="spritesheet-field form-control"  aria-label="frame_width">
                                @error('frame_width')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-text">Height</span>
                                <input id="frame_height" step="any" type="number" class="spritesheet-field form-control" aria-label="frame_height">
                                @error('frame_height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name" class="form-label">{{ __('Starting and ending frame') }}</label>
                            <div class=" input-group mb-3">
                                <span class="input-group-text">Start</span>
                                <input id="start_frame" step="any" type="number" class="spritesheet-field form-control"  aria-label="start_frame">
                                @error('start_frame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-text">End</span>
                                <input id="end_frame" step="any" type="number" class="spritesheet-field form-control" aria-label="end_frame">
                                @error('end_frame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div >
                                <img class="sprite-image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
