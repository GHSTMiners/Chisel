@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="{{ route('server-regions.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add server region') }}</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">{{ __('URL') }}</label>
                                <input id="url" type="text" class="form-control @error('name') is-invalid @enderror" name="url" value="{{ old('name') }}" required autocomplete="url" autofocus>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="longitude" class="form-label">{{ __('Coordinates') }}</label>
                            <div id="map"></div>
                            <div class="input-group mb-3">
                                <input id="latitude" type="number" step="0.00000000000000001" class="form-control @error('minimum') is-invalid @enderror" placeholder="Latitude" name="latitude" value="{{ old('minimum') }}" required autofocus>
                                @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="longitude" type="number" step="0.00000000000000001" class="form-control @error('minimum') is-invalid @enderror" placeholder="Longitude" name="longitude" value="{{ old('longitude') }}" required autofocus>
                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="flag" class="form-label">{{ __('Flag') }}</label>
                                <input id="flag" type="file" class="form-control @error('flag') is-invalid @enderror" name="flag" value="{{ old('flag') }}" required autocomplete="flag">
                                @error('flag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="active" id="active" value=1 checked>
                                    <label class="form-check-label" for="active">{{ __('Active') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
