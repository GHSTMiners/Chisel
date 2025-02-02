@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('crypto.update', [$crypto->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <h4 class="card-title">{{ __('Edit crypto') }}</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $crypto->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="shortcode" class="form-label">{{ __('shortcode') }}</label>
                                <input id="shortcode" type="text" class="form-control @error('shortcode') is-invalid @enderror" name="shortcode" value="{{ old('shortcode') ?? $crypto->shortcode}}" required autocomplete="shortcode" autofocus>
                                @error('shortcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="wallet_address" class="form-label">{{ __('Wallet address') }}</label>
                                <input id="wallet_address" type="text" class="form-control @error('name') is-invalid @enderror" name="wallet_address" value="{{ old('wallet_address') ?? $crypto->wallet_address }}" autocomplete="wallet_address" autofocus>
                                @error('wallet_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">{{ __('Weight') }}</label>
                                <input id="weight" step="any" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') ?? $crypto->weight }}"  autocomplete="name" autofocus>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="soil_image" class="form-label">{{ __('Soil image') }}</label>
                                <input id="soil_image" type="file" class="form-control @error('soil_image') is-invalid @enderror" name="soil_image" value="{{ old('soil_image') }}">
                                @error('soil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="wallet_image" class="form-label">{{ __('Wallet image') }}</label>
                                <input id="wallet_image" type="file" class="form-control @error('wallet_image') is-invalid @enderror" name="wallet_image" value="{{ old('wallet_image') }}">
                                @error('wallet_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mining_sound" class="form-label">{{ __('Mining sound') }}</label>
                                <input id="mining_sound" type="file" class="form-control @error('mining_sound') is-invalid @enderror" name="mining_sound" value="{{ old('mining_sound') }}" autocomplete="mining_sound">
                                @error('mining_sound')
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
