@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                        <h4 class="card-title">{{ __('Edit Trait Efffect') }}</h4>   
                        @if(!$skill->default)
                        <form method="POST" action="{{ route('traitEffect.destroy', [$skill->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="d-flex form-group justify-content-end">
                                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                            </div>
                        </form>
                        @endif
                        </div>
                        <form method="POST" action="{{ route('skill.update', $skill->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $skill->name }}" required autocomplete="name" autofocus @if($skill->default) disabled @endif>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{old('description') ?? $skill->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="minimum" class="form-label">{{ __('Minimum') }}</label>
                                <input id="minimum" step="any" type="number" class="form-control @error('minimum') is-invalid @enderror" name="minimum" value="{{ old('minimum') ?? $skill->minimum }}" required autocomplete="name" autofocus>
                                @error('minimum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="maximum" class="form-label">{{ __('Maximum') }}</label>
                                <input id="maximum" step="any" type="number" class="form-control @error('maximum') is-invalid @enderror" name="maximum" value="{{ old('maximum') ?? $skill->maximum }}" required autocomplete="name" autofocus>
                                @error('maximum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="initial" class="form-label">{{ __('Initial') }}</label>
                                <input id="initial" step="any" type="number" class="form-control @error('initial') is-invalid @enderror" name="initial" value="{{ old('initial') ?? $skill->initial }}" required autocomplete="name" autofocus>
                                @error('initial')
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
