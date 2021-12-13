@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Trait Effects</h1>
                <a type="button" href="{{ route('trait-effect.create') }}" class="btn btn-primary btn-lg">Add trait effect 🤹</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Trait</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($traitEffects as $currentTraitEffect)
            <tr class="clickable-row" data-href="{{route('trait-effect.edit', $currentTraitEffect->id)}}">
                <th scope="row">{{$currentTraitEffect->id}}</th>
                <td>{{$currentTraitEffect->name}}</td>
                <td>{{$currentTraitEffect->description}}</td>
                <td>{{$currentTraitEffect->trait->name}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
