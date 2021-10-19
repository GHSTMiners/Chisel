@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('soil.update', [$soil->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <h4 class="card-title">{{ __('Edit soil') }}</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  ?? $soil->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dig_multiplier" class="form-label">{{ __('Dig multiplier') }}</label>
                                <input id="dig_multiplier" step="any" type="number" class="form-control @error('dig_multiplier') is-invalid @enderror" name="dig_multiplier" value="{{ old('dig_multiplier') ?? $soil->dig_multiplier}}" required autocomplete="name" autofocus>
                                @error('dig_multiplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="layers" class="form-label">{{ __('Layers') }}</label>
                                <input id="layers" step="any" type="number" class="form-control @error('layers') is-invalid @enderror" name="layers" value="{{ old('layers') ?? $soil->layers }}" required autocomplete="name" autofocus>
                                @error('layers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="top_image" class="form-label">{{ __('Top soil image') }}</label>
                                <input id="top_image" type="file" class="form-control @error('top_image') is-invalid @enderror" name="top_image" value="{{ old('top_image') }}">
                                @error('top_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="middle_image" class="form-label">{{ __('Middle soil image') }}</label>
                                <input id="middle_image" type="file" class="form-control @error('middle_image') is-invalid @enderror" name="middle_image" value="{{ old('middle_image') }}">
                                @error('middle_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="bottom_image" class="form-label">{{ __('Top soil image') }}</label>
                                <input id="bottom_image" type="file" class="form-control @error('bottom_image') is-invalid @enderror" name="bottom_image" value="{{ old('bottom_image') }}">
                                @error('bottom_image')
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
