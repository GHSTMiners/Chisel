<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Skill</th>
        <th scope="col">Multiplier</th>
        <th scope="col">Offset</th>
    </tr>
</thead>
<tbody>
@foreach ($traitEffect->skillEffects as $currentEffect)
    <tr  class="clickable-row" data-href="{{route('trait-effect.skills.edit', [$traitEffect, $currentEffect])}}">
        <th scope="row">{{$currentEffect->id}}</th>
        <td>{{$currentEffect->skill->name}}</td>
        <td>{{$currentEffect->multiplier}}</td>
        <td>{{$currentEffect->offset}}</td>
        <td>
        <form method="POST" action="{{ route('trait-effect.skills.destroy', [$traitEffect, $currentEffect]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="d-flex form-group justify-content-end">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
        </form>
    </tr>
@endforeach
</tbody>
</table>

<div class="d-grid gap-2">
    <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{ route('trait-effect.skills.create', $traitEffect->id) }}" role="button">Add Skill effect</a>
</div>


