
<form method="POST" action="{{ route('trait-effect.update', $traitEffect->id) }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $traitEffect->name }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>{{ old('description') ?? $traitEffect->description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Trait') }}</label>
        <select class="form-select" aria-label="trait_id" name="trait_id">
        @foreach ($traits as $currentTrait)
            <option value="{{$currentTrait->id}}" @if($traitEffect->trait_id == $currentTrait->id) selected @endif>{{$currentTrait->name}}</option>
            
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>  
</form>