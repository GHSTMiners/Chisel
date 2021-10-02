@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Aavegotchi Traits</h1>
            </div>
        <table class="table table-striped table-bordered">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Short name</th>
                <th scope="col">Name</th>
                <th scope="col">Blockchain index</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($aavegotchiTraits as $currentTrait)
            <tr>
                <th scope="row">{{$currentTrait->id}}</th>
                <td>{{$currentTrait->short_name}}</td>
                <td>{{$currentTrait->name}}</td>
                <td>{{$currentTrait->blockchain_index}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
