@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('explosive.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add explosive') }}</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <div class="input-group mb-3">
                                <input id="price" type="text" class="form-control" placeholder="0.00" aria-label="price" name="price" required>
                                <select class="form-select" aria-label="crypto_id" name="crypto_id">
                                @foreach ($crypto as $currentCrypto)
                                    <option value="{{$currentCrypto->id}}">{{$currentCrypto->name}}</option>
                                    
                                @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="soil_image" class="form-label">{{ __('Soil image') }}</label>
                                <input id="soil_image" type="file" class="form-control @error('soil_image') is-invalid @enderror" name="soil_image" value="{{ old('soil_image') }}" required autocomplete="soil_image">
                                @error('soil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inventory_image" class="form-label">{{ __('Inventory image') }}</label>
                                <input id="inventory_image" type="file" class="form-control @error('inventory_image') is-invalid @enderror" name="inventory_image" value="{{ old('inventory_image') }}" required autocomplete="inventory_image">
                                @error('inventory_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="drop_image" class="form-label">{{ __('Drop image') }}</label>
                                <input id="drop_image" type="file" class="form-control @error('drop_image') is-invalid @enderror" name="drop_image" value="{{ old('drop_image') }}" required autocomplete="drop_image">
                                @error('drop_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="explosion_sound" class="form-label">{{ __('Explosion sound') }}</label>
                                <input id="explosion_sound" type="file" class="form-control @error('explosion_sound') is-invalid @enderror" name="explosion_sound" value="{{ old('explosion_sound') }}" required autocomplete="explosion_sound">
                                @error('explosion_sound')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="explosive_coordinates" class="form-label">{{ __('Explosive coordinates') }}</label>
                                @error('explosive_coordinates')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @for ($x = -5; $x < 6; $x++)
                                    <div class="explosive-coordinate-cell">
                                        @for ($y = -5; $y < 6; $y++)
                                        @if (($x == 0) && ($y == 0))
                                              <input class="form-check-input" type="radio" checked disabled>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="explosive_coordinates[{{$x}}][{{$y}}]" value="({{$x}}, {{$y}})">
                                        @endif
                                        @endfor
                                    </div>
                                @endfor
                                <br/>
                                <input class="form-check-input" type="radio" checked disabled> <label for="explosive_coordinates" class="form-label">{{ __('  = Position of explosive') }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="lifespan" class="form-label">{{ __('Lifespan (seconds)') }}</label>
                                <input id="lifespan" step="any" type="number" class="form-control @error('lifespan') is-invalid @enderror" name="lifespan" value="{{ old('lifespan') }}" required autocomplete="name" autofocus>
                                @error('lifespan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="purchase_limit" class="form-label">{{ __('Purchase limit') }}</label>
                                <input id="purchase_limit" step="any" type="number" class="form-control @error('purchase_limit') is-invalid @enderror" name="purchase_limit" value="{{ old('purchase_limit') }}" required autocomplete="name" autofocus>
                                @error('purchase_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="spawn_limit" class="form-label">{{ __('Spawn limit') }}</label>
                                <input id="spawn_limit" step="any" type="number" class="form-control @error('spawn_limit') is-invalid @enderror" name="spawn_limit" value="{{ old('spawn_limit') }}" required autocomplete="name" autofocus>
                                @error('spawn_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="mine" id="mine" value=1>
                                    <label class="form-check-label" for="mine">{{ __('Mine') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="ignore_owner" id="ignore_owner" value=1>
                                    <label class="form-check-label" for="ignore_owner">{{ __('Ignore owner') }}</label>
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
