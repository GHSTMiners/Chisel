@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit soil') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_soil', [$soil->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $soil->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dig multiplier') }}</label>

                                <div class="col-md-6">
                                    <input id="dig_multiplier" step="any" type="number" class="form-control @error('dig_multiplier') is-invalid @enderror" name="dig_multiplier" value="{{ old('dig_multiplier') ?? $soil->dig_multiplier }}" required autocomplete="name" autofocus>

                                    @error('dig_multiplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Top soil image') }}</label>

                                <div class="col-md-6">
                                    <input id="top_image" type="file" class="form-control-file @error('top_image') is-invalid @enderror" name="top_image" value="{{ old('top_image') }}" autocomplete="top_image">

                                    @error('top_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Middle soil image') }}</label>

                                <div class="col-md-6">
                                    <input id="middle_image" type="file" class="form-control-file @error('middle_image') is-invalid @enderror" name="middle_image" value="{{ old('middle_image') }}" autocomplete="middle_image">

                                    @error('middle_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Bottom soil image') }}</label>

                                <div class="col-md-6">
                                    <input id="bottom_image" type="file" class="form-control-file @error('bottom_image') is-invalid @enderror" name="bottom_image" value="{{ old('bottom_image') }}" autocomplete="bottom_image">

                                    @error('bottom_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
