    <table class="table table-striped table-bordered table-hover">

    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Stat</th>
            <th scope="col">Effect</th>
            <th scope="col">Modifier</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($consumable->consumableSkillEffects as $currentEffect)
        <tr class="clickable-row" data-href="{{route('consumableSkillEffect.edit', $currentEffect->id)}}">
            <th scope="row">{{$currentEffect->id}}</th>
            <td>{{$currentEffect->stat->name}}</td>
            <td>{{$currentEffect->effect}}</td>
            <td>{{$currentEffect->modifier}}</td>
            <td>{{$currentEffect->amount}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <div class="d-grid gap-2">
    <a type="button" href="{{ route('consumableSkillEffect.create') }}" class="btn btn-primary btn-block">Add skill effect</a>
    </div>

