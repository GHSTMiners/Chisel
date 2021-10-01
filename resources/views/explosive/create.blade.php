@extends('layouts.app')

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


                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
