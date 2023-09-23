@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('consumable.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add Consumable') }}</h4>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-consumable-tab" data-bs-toggle="tab" data-bs-target="#nav-consumable" type="button" role="tab" aria-controls="nav-consumable" aria-selected="true">Information</button>
                                    <button class="nav-link" id="nav-vitals-tab" data-bs-toggle="tab" data-bs-target="#nav-vitals" type="button" role="tab" aria-controls="nav-vitals" aria-selected="false">Vitals</button>
                                    <button class="nav-link" id="nav-skills-tab" data-bs-toggle="tab" data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-skills" aria-selected="false">Skills</button>
                                    <button class="nav-link" id="nav-code-tab" data-bs-toggle="tab" data-bs-target="#nav-code" type="button" role="tab" aria-controls="nav-code" aria-selected="false">Code</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-consumable" role="tabpanel" aria-labelledby="nav-consumable-tab">
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
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">{{ __('Image') }}</label>
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="duration" class="form-label">{{ __('Duration (seconds)') }}</label>
                                        <input id="duration" step="any" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration')}}" required autocomplete="name" autofocus>
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="carry_limit" class="form-label">{{ __('Carry limit') }}</label>
                                        <input id="carry_limit" step="any" type="number" class="form-control @error('carry_limit') is-invalid @enderror" name="carry_limit" value="{{ old('carry_limit')}}" required autocomplete="name" autofocus>
                                        @error('carry_limit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="purchase_limit" class="form-label">{{ __('Purchase limit') }}</label>
                                        <input id="purchase_limit" step="any" type="number" class="form-control @error('purchase_limit') is-invalid @enderror" name="purchase_limit" value="{{ old('purchase_limit')}}" required autocomplete="name" autofocus>
                                        @error('purchase_limit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab">
                                    <div class="mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Formula</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($skills as $currentSkill)
                                                <tr>
                                                    <th scope="row">{{$currentSkill->name}}</th>
                                                    <td><input name="skill[{{$currentSkill->id}}]" onchange="validateExpression(this)" class="form-control math-expression" placeholder="e.g. 1.1 * (original)" type="text"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-vitals" role="tabpanel" aria-labelledby="nav-vitals-tab">
                                    <div class="mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Formula</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vitals as $currentVital)
                                                <tr>
                                                    <th scope="row">{{$currentVital->name}}</th>
                                                    <td><input name="vital[{{$currentVital->id}}]" onchange="validateExpression(this)" class="form-control math-expression" placeholder="e.g. 1.1 * (original)" type="text"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-code" role="tabpanel" aria-labelledby="nav-code-tab">
                                    <div class="mb-3">
                                        <textarea id="script" class="form-control @error('script') is-invalid @enderror" rows="20" name="script" value="{{ old('script')}}"></textarea>
                                        @error('script')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
