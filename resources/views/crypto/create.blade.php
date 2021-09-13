@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add crypto') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/crypto" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Wallet address') }}</label>

                                <div class="col-md-6">
                                    <input id="wallet_address" type="text" class="form-control @error('wallet_address') is-invalid @enderror" name="wallet_address" value="{{ old('wallet_address') }}" required autocomplete="name" autofocus>

                                    @error('wallet_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                                <div class="col-md-6">
                                    <input id="weight" step="any" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="name" autofocus>

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Soil image') }}</label>

                                <div class="col-md-6">
                                    <input id="soil_image" type="file" class="form-control-file @error('soil_image') is-invalid @enderror" name="soil_image" value="{{ old('soil_image') }}" required autocomplete="soil_image">

                                    @error('soil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Wallet image') }}</label>

                                <div class="col-md-6">
                                    <input id="wallet_image" type="file" class="form-control-file @error('wallet_image') is-invalid @enderror" name="wallet_image" value="{{ old('wallet_image') }}" required autocomplete="wallet_image">

                                    @error('wallet_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
