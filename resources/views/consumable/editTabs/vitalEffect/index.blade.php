<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new vital effect</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="addConsumableVitalEffectForm" action="{{ route('consumableVitalEffect.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="consumable_id" name="consumable_id" value={{ $consumable->id }}>
            <label for="Vital" class="form-label">{{ __('Vital') }}</label>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="vital_id" name="vital_id">
                @foreach ($vitals as $currentVital)
                    <option value="{{$currentVital->id}}">{{$currentVital->name}}</option>
                @endforeach
                </select>
            </div>

            <label for="Effect" class="form-label">{{ __('Effect') }}</label>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="effect" name="effect">
                    <option value="Increase">Increase</option>
                    <option value="Decrease">Decrease</option>
                </select>
            </div>

            <label for="Modifier" class="form-label">{{ __('Modifier') }}</label>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="modifier" name="modifier">
                    <option value="Fixed">Fixed</option>
                    <option value="Percentage">Percentage</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="amount" class="form-label">{{ __('Amount') }}</label>
                <input id="amount" type="text" class="form-control"  @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="0.00" aria-label="amount" required>
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="addConsumableVitalEffect" class="btn btn-primary ">{{ __('Save') }}</button>  
      </div>
    </div>
  </div>
</div>


<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Vital</th>
        <th scope="col">Effect</th>
        <th scope="col">Modifier</th>
        <th scope="col">Amount</th>
    </tr>
</thead>
<tbody>
@foreach ($consumable->consumableVitalEffects as $currentEffect)
    <tr class="clickable-row" data-href="{{route('consumableVitalEffect.edit', $currentEffect->id)}}">
        <th scope="row">{{$currentEffect->id}}</th>
        <td>{{$currentEffect->vital->name}}</td>
        <td>{{$currentEffect->effect}}</td>
        <td>{{$currentEffect->modifier}}</td>
        <td>{{$currentEffect->amount}}</td>
    </tr>
@endforeach
</tbody>
</table>

<div class="d-grid gap-2">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Vital effect
    </button>
</div>


<!-- Script -->
<script>
    $( "#addConsumableVitalEffect" ).click(function() {
        $("#addConsumableVitalEffectForm").submit();
    });
</script>

