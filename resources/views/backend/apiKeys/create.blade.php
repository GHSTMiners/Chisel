@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="{{ route('api-keys.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add API Keys') }}</h4>

                            <div class="mb-3">
                                <label for="key" class="form-label">{{ __('Key') }}</label>
                                <input id="key" type="text" class="form-control @error('name') is-invalid @enderror" name="key" value="{{ $random }}" required autofocus readonly>
                                @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ip_addresses" class="form-label">{{ __('IP Address (comma separated)') }}</label>
                                <input id="ip_addresses" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="validationServerIPFeedback" name="ip_addresses" value="{{ old('ip_addresses') }}" autocomplete="ip_addresses" autofocus>
                                @error('ip_addresses')
                                <div id="validationServerIPFeedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('Notes') }}</label>
                                <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" autofocus>{{old('notes')}}</textarea>
                                @error('notes')
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
