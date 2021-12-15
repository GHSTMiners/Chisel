@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('trait-effect.skills.update', [$traitEffect, $traitSkillEffect]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <h4 class="card-title">{{ __('Edit Trait Skill effect') }}</h4>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Trait Effect') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $traitEffect->name }}" readonly>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Skill') }}</label>
                                <select class="form-select" aria-label="skill_id" name="skill_id">
                                @foreach ($skills as $currentSkill)
                                    <option value="{{$currentSkill->id}}" @if($currentSkill->id == $traitSkillEffect->skill_id) selected @endif>{{$currentSkill->name}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="multiplier" class="form-label">{{ __('Multiplier') }}</label>
                                <input id="multiplier" name="multiplier" type="number" placeholder="0.00" step="0.001" class="form-control @error('name') is-invalid @enderror" value="{{ old('multiplier') ?? $traitSkillEffect->multiplier }}" >
                                @error('multiplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="offset" class="form-label">{{ __('Offset') }}</label>
                                <input id="offset" name="offset" type="number" placeholder="0.00" step="0.001" class="form-control @error('name') is-invalid @enderror" value="{{ old('offset') ?? $traitSkillEffect->offset }}" >
                                @error('offset')
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
