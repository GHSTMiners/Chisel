<!-- Modal -->
<div class="modal fade" id="world-picker" tabindex="-1" aria-labelledby="world-picker" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change world</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="select-world-form">
        <ul class="list-group" id="#world-selection-group">
          @foreach($worlds as $currentWorld)
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="selected-world" value={{ $currentWorld->id }} aria-label="..." @if($currentWorld->id == $selectedWorld->id) checked @endif()>
            {{ $currentWorld->name }}
          </li>
          @endforeach()
        </ul>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="change-world-button" class="btn btn-primary">Load selected world</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="world-delete" tabindex="-1" aria-labelledby="world-delete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete world world</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete world: {{ $selectedWorld->name }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="delete-world-button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="world-add" tabindex="-1" aria-labelledby="world-add" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add world</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('world.store') }}" id="add-world-form" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="worldNameInput" class="form-label">World name</label>
            <input type="text" class="form-control" id="worldNameInput" aria-describedby="name" name="name">
          </div>

        <label for="width" class="form-label">Size</label>
        <div class="input-group mb-3">
          <span class="input-group-text">Width</span>
          <input type="number" class="form-control" placeholder="eg. 40" name="width" aria-label="width">
          <span class="input-group-text">Height</span>
          <input type="number" class="form-control" placeholder="eg. 1000" name="height" aria-label="height">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{old('description')}}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">{{ __('Video') }}</label>
            <input id="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" required autocomplete="video">
            @error('video')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

          <div class="mb-3">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="development_mode" id="development_mode" value=1>
                  <label class="form-check-label" for="development_mode">{{ __('Development mode') }}</label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="published" id="published" value=1>
                  <label class="form-check-label" for="published">{{ __('Published') }}</label>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add-world-button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="world-edit" tabindex="-1" aria-labelledby="world-edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit world</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('world.update', $selectedWorld->id) }}" id="edit-world-form" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="mb-3">
            <label for="worldNameInput" class="form-label">World name</label>
            <input type="text" class="form-control" id="worldNameInput" aria-describedby="name" name="name" value="{{ $selectedWorld->name }}">
          </div>

          <label for="width" class="form-label">Size</label>
          <div class="input-group mb-3">
            <span class="input-group-text">Width</span>
            <input type="number" class="form-control" placeholder="eg. 40" name="width" aria-label="width" value="{{$selectedWorld->width}}">
            <span class="input-group-text">Height</span>
            <input type="number" class="form-control" placeholder="eg. 1000" name="height" aria-label="height" value="{{$selectedWorld->height}}">
          </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{$selectedWorld->description}}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">{{ __('Video') }}</label>
            <input id="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" required autocomplete="video">
            @error('video')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <label for="price" class="form-label">{{ __('World crypto') }}</label>
        <div class="input-group mb-3">
            <select class="form-select" aria-label="world_crypto_id" name="world_crypto_id">
            @foreach ($selectedWorld->crypto as $currentCrypto)
                <option value="{{$currentCrypto->id}}"  @if( $selectedWorld->world_crypto_id == $currentCrypto->id) selected @endif >{{$currentCrypto->name}}</option>
                
            @endforeach
            </select>
        </div>
          <div class="mb-3">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="development_mode" id="development_mode" value=1 @if($selectedWorld->development_mode) checked @endif()>
                  <label class="form-check-label" for="development_mode">{{ __('Development mode') }}</label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="published" id="published" value=1 @if($selectedWorld->published) checked @endif()>
                  <label class="form-check-label" for="published">{{ __('Published') }}</label>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="edit-world-button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>


<script>
$( "#change-world-button" ).click(function() {
    window.location.href = '/administrator/world/'+$('#select-world-form').serializeArray()[0].value; //relative to domain
});

$( "#add-world-button" ).click(function() {
    $("#add-world-form").submit();
});

$( "#edit-world-button" ).click(function() {
    $("#edit-world-form").submit();
});


$( "#delete-world-button" ).click(function() {
    $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ route('world.destroy', $selectedWorld->id) }}",
    type: 'DELETE',
    complete: function(result) {
        location.reload();
    }
    });
});
</script>
