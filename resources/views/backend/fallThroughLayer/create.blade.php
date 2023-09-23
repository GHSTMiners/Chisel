@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="{{ route('fall-through.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add fallthrough layer') }}</h4>
                            <div class="mb-3">
                                <label for="layer" class="form-label">{{ __('Layer') }}</label>
                                <input id="layer" type="number" class="form-control @error('name') is-invalid @enderror" name="layer" value="{{ old('layer') }}" required autocomplete="layer" autofocus>
                                @error('nalayerme')
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
