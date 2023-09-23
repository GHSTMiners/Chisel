@extends('backend.layouts.app')
<script src="{{ asset('js/app.js') }}" defer></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" id="create-new-puzzle-form" action="{{ route('puzzle.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="name" class="form-label">{{ __('Size') }}</label>
                    <div class=" input-group mb-3">
                        <span class="input-group-text">Width</span>
                        <input id="puzzle-width" step="any" type="number" min="1" max="10" class="form-control" placeholder="Amount of blocks" aria-label="Width" value=10>
                        <span class="input-group-text">Height</span>
                        <input id="puzzle-height" step="any" type="number" min="1" max="20" class="form-control" placeholder="Amount of blocks" aria-label="Height" value=10>
                        <a href="#" id="puzzle-reload-button" class="btn btn-primary">Reload</a>
                    </div>
                    <label for="name" class="form-label">{{ __('Puzzle design') }}</label>
                        <div class="row">
                            <div class="col-2">
                            <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSoil">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSoil" aria-expanded="false" aria-controls="collapseSoil">
                                    Soil
                                </button>
                                </h2>
                                <div id="collapseSoil" class="accordion-collapse collapse show" aria-labelledby="headingSoil" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                    @foreach ($soil as $currentSoil)
                                        <div class="row">
                                            <img src="{{"/storage/".$currentSoil->middle_image}}" draggable="true" data-id={{$currentSoil->id}} class="img-thumbnail puzzle-dragable puzzle-soil" alt="{{$currentSoil->name}}">
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingRocks">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRocks" aria-expanded="false" aria-controls="collapseRocks">
                                    Rocks
                                </button>
                                </h2>
                                <div id="collapseRocks" class="accordion-collapse collapse" aria-labelledby="headingRocks" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                    @foreach ($rocks as $currentRock)
                                        <div class="row">
                                            <img src="{{"/storage/".$currentRock->image}}" draggable="true" data-id={{$currentRock->id}} class="img-thumbnail puzzle-dragable puzzle-rock" alt="{{$currentRock->name}}">
                                        </div>
                                    @endforeach     
                                    </div>                           
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCrypto">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCrypto" aria-expanded="false" aria-controls="collapseCrypto">
                                    Crypto
                                </button>
                                </h2>
                                <div id="collapseCrypto" class="accordion-collapse collapse" aria-labelledby="headingCrypto" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                    @foreach ($crypto as $currentCrypto)
                                        <div class="row">
                                            <img src="{{"/storage/".$currentCrypto->soil_image}}" draggable="true" data-id={{$currentCrypto->id}} class="img-thumbnail puzzle-dragable puzzle-crypto" alt="{{$currentCrypto->name}}">
                                        </div>
                                    @endforeach     
                                    </div>                           
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingExplosives">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExplosives" aria-expanded="false" aria-controls="collapseExplosives">
                                    Explosives
                                </button>
                                </h2>
                                <div id="collapseExplosives" class="accordion-collapse collapse" aria-labelledby="headingExplosives" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                    @foreach ($explosives as $currentExplosive)
                                        <div class="row">
                                            <img src="{{"/storage/".$currentExplosive->soil_image}}" draggable="true" data-id={{$currentExplosive->id}} class="img-thumbnail puzzle-dragable puzzle-explosive" alt="{{$currentExplosive->name}}">
                                        </div>
                                    @endforeach     
                                    </div>                           
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingConsumables">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConsumables" aria-expanded="false" aria-controls="collapseConsumables">
                                    Consumables
                                </button>
                                </h2>
                                <div id="collapseConsumables" class="accordion-collapse collapse" aria-labelledby="headingConsumables" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                    @foreach ($consumables as $currentConsumable)
                                        <div class="row">
                                            <img src="{{"/storage/".$currentConsumable->image}}" draggable="true" data-id={{$currentConsumable->id}} class="img-thumbnail puzzle-dragable puzzle-consumable" alt="{{$currentConsumable->name}}">
                                        </div>
                                    @endforeach     
                                    </div>                           
                                </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="puzzle-designer col-10">

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
