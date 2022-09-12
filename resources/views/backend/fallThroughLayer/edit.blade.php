@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                        <h4 class="card-title">{{ __('Edit fallthrough layer') }}</h4>   
                        <form method="POST" action="{{ route('fall-through.destroy', [$fallThroughLayer->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="d-flex form-group justify-content-end">
                                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                            </div>
                        </form>
                        </div>
                        <form method="POST" autocomplete="off" action="{{ route('fall-through.update', $fallThroughLayer->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="layer" class="form-label">{{ __('Layer') }}</label>
                                <input id="layer" type="number" class="form-control @error('name') is-invalid @enderror" name="layer" value="{{ old('layer') ?? $fallThroughLayer->layer }}" required autocomplete="layer" autofocus>
                                @error('layer')
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
