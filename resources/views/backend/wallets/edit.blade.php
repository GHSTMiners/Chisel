@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                        <h4 class="card-title">{{ __('Edit wallet') }}</h4>   
                        <form method="POST" action="{{ route('wallet.destroy', [$wallet->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="d-flex form-group justify-content-end">
                                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                            </div>
                        </form>
                        </div>
                        <form method="POST" action="{{ route('wallet.update', $wallet->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Wallet address') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $wallet->address }}" autocomplete="address" readonly>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="chain_id" class="form-label">{{ __('Chain ID') }}</label>
                                <input id="chain_id" type="text" class="form-control @error('chain_id') is-invalid @enderror" name="chain_id" value="{{ old('chain_id') ?? $wallet->chain_id }}" autocomplete="chain_id" readonly>
                                @error('chain_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="chain_id" class="form-label">{{ __('Roles') }}</label>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="admin" id="admin" value=1 @if($wallet->role->admin) checked @endif>
                                    <label class="form-check-label" for="admin">{{ __('Admin') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="developer" id="developer" value=1 @if($wallet->role->developer) checked @endif>
                                    <label class="form-check-label" for="developer">{{ __('Developer') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="moderator" id="moderator" value=1 @if($wallet->role->moderator) checked @endif>
                                    <label class="form-check-label" for="moderator">{{ __('Moderator') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
