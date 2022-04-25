@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('upgrade.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">{{ __('Add upgrade') }}</h4>

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="true">Information</button>
                                    <button class="nav-link" id="nav-prices-tab" data-bs-toggle="tab" data-bs-target="#nav-prices" type="button" role="tab" aria-controls="nav-prices" aria-selected="false">Prices</button>
                                    <button class="nav-link" id="nav-skills-tab" data-bs-toggle="tab" data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-skills" aria-selected="false">Skills</button>
                                    <button class="nav-link" id="nav-vitals-tab" data-bs-toggle="tab" data-bs-target="#nav-vitals" type="button" role="tab" aria-controls="nav-vitals" aria-selected="false">Vitals</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
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
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-prices" role="tabpanel" aria-labelledby="nav-prices-tab">
                                    <div class="mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Uncommon</th>
                                                <th scope="col">Rare</th>
                                                <th scope="col">Legendary</th>
                                                <th scope="col">Mythical</th>
                                                <th scope="col">Godlike</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($crypto as $currentCrypto)
                                                <tr>
                                                    <th scope="row">{{$currentCrypto->name}}</th>
                                                    <td><input name="price[{{$currentCrypto->id}}][1]" class="form-control" placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][2]" class="form-control" placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][3]" class="form-control" placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][4]" class="form-control" placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][5]" class="form-control" placeholder="0" type="number"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
                                                    <td><input name="skill[{{$currentSkill->id}}]" onchange="validateExpression(this)" class="form-control math-expression" placeholder="e.g. tier * 1.1 * (origional)" type="text"></td>
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
                                                    <td><input name="vital[{{$currentVital->id}}]" onchange="validateExpression(this)" class="form-control math-expression" placeholder="e.g. tier * 1.1 * (origional)" type="text"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
