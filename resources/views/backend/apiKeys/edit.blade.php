@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                        <h4 class="card-title">{{ __('Edit API Key') }}</h4>   
                        <form method="POST" action="{{ route('api-keys.destroy', [$apiKey->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="d-flex form-group justify-content-end">
                                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                            </div>
                        </form>
                        </div>
                        <form method="POST" autocomplete="off" action="{{ route('api-keys.update', $apiKey->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="key" class="form-label">{{ __('Key') }}</label>
                                <input id="key" type="text" class="form-control @error('name') is-invalid @enderror" name="key" value="{{ $apiKey->key }}" required autofocus readonly>
                                @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ip_addresses" class="form-label">{{ __('IP Address (comma separated)') }}</label>
                                <input id="ip_addresses" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="validationServerIPFeedback" name="ip_addresses" value="{{ $apiKey->ips()->pluck('ip')->join(', ') }}" autocomplete="ip_addresses" autofocus>
                                @error('ip_addresses')
                                <div id="validationServerIPFeedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('Notes') }}</label>
                                <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" autofocus>{{old('notes') ?? $apiKey->notes}}</textarea>
                                @error('notes')
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
