<form method="POST" action="{{ route('consumable.update', [$consumable->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $consumable->name}}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <label for="price" class="form-label">{{ __('Price') }}</label>
    <div class="input-group mb-3">
        <input id="price" type="text" class="form-control" placeholder="0.00" aria-label="price" value="{{ old('price') ?? $consumable->price }}" name="price" required>
        <select class="form-select" aria-label="crypto" name="crypto">
        @foreach ($crypto as $currentCrypto)
            <option value="{{$currentCrypto->id}}"  @if($consumable->crypto == $currentCrypto->id) selected @endif>{{$currentCrypto->name}}</option>
            
        @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{old('description') ?? $consumable->description}}</textarea>
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
    <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>  
</form>