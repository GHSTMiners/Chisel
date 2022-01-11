@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="{{ route('vital.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add Vital') }}</h4>
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
                                <label for="minimum" class="form-label">{{ __('Minimum') }}</label>
                                <input id="minimum" type="text" class="form-control math-expression @error('minimum') is-invalid @enderror" name="minimum" value="{{ old('minimum') ?? 0 }}" required autocomplete="name" autofocus>
                                @error('minimum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">
                                    Formula invalid
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="maximum" class="form-label">{{ __('Maximum') }}</label>
                                <input id="maximum" type="text" class="form-control math-expression @error('maximum') is-invalid @enderror" name="maximum" value="{{ old('maximum') ?? 100 }}" required autocomplete="name" autofocus>
                                @error('maximum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">
                                    Formula invalid
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="initial" class="form-label">{{ __('Initial') }}</label>
                                <input id="initial" type="text" class="form-control math-expression @error('initial') is-invalid @enderror" name="initial" value="{{ old('initial') ?? 100 }}" required autocomplete="name" autofocus>
                                @error('initial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">
                                    Formula invalid
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
