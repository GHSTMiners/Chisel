@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('wallet.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add wallet') }}</h4>
                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Wallet address') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" >
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="chain_id" class="form-label">{{ __('Chain ID') }}</label>
                                <input id="chain_id" type="text" class="form-control @error('chain_id') is-invalid @enderror" name="chain_id" value="{{ old('chain_id') }}" autocomplete="chain_id" >
                                @error('chain_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="chain_id" class="form-label">{{ __('Roles') }}</label>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="admin" id="admin" value=1>
                                    <label class="form-check-label" for="admin">{{ __('Admin') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="developer" id="developer" value=1>
                                    <label class="form-check-label" for="developer">{{ __('Developer') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="moderator" id="moderator" value=1>
                                    <label class="form-check-label" for="moderator">{{ __('Moderator') }}</label>
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
