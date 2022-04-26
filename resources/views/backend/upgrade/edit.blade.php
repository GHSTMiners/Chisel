@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                            <h4 class="card-title">{{ __('Edit upgrade') }}</h4>   
                            <form method="POST" action="{{ route('upgrade.destroy', [$upgrade->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="d-flex form-group justify-content-end">
                                    <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                                </div>
                            </form>
                        </div>
                        <form method="POST" autocomplete="off" action="{{ route('upgrade.update', $upgrade->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
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
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $upgrade->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{ old('description') ?? $upgrade->description }}</textarea>
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
                                                @php 
                                                    $currentPrice = $upgrade->prices()->where('crypto_id', $currentCrypto->id)->first()
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$currentCrypto->name}}</th>
                                                    <td><input name="price[{{$currentCrypto->id}}][1]" class="form-control" @if($currentPrice->tier_1) value={{$currentPrice->tier_1}} @endif placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][2]" class="form-control" @if($currentPrice->tier_2) value={{$currentPrice->tier_2}} @endif placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][3]" class="form-control" @if($currentPrice->tier_3) value={{$currentPrice->tier_3}} @endif placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][4]" class="form-control" @if($currentPrice->tier_4) value={{$currentPrice->tier_4}} @endif placeholder="0" type="number"></td>
                                                    <td><input name="price[{{$currentCrypto->id}}][5]" class="form-control" @if($currentPrice->tier_5) value={{$currentPrice->tier_5}} @endif placeholder="0" type="number"></td>
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
                                                @php 
                                                    $currentSkillEffect = $upgrade->skill_effects()->where('skill_id', $currentSkill->id)->first()
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$currentSkill->name}}</th>
                                                    <td>
                                                        <input name="skill[{{$currentSkill->id}}]" onchange="validateExpression(this)" class="form-control math-expression" @if($currentSkillEffect) value="{{$currentSkillEffect->formula}}"@endif placeholder="e.g. tier * 1.1 * (original)" type="text">
                                                        <div class="invalid-feedback">
                                                            Formula invalid
                                                        </div>
                                                    </td>
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
                                                @php 
                                                    $currentVitalEffect = $upgrade->vital_effects()->where('vital_id', $currentVital->id)->first()
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$currentVital->name}}</th>
                                                    <td><input name="vital[{{$currentVital->id}}]" onchange="validateExpression(this)" class="form-control math-expression" @if($currentVitalEffect) value="{{$currentVitalEffect->formula}}"@endif placeholder="e.g. tier * 1.1 * (original)" type="text"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
