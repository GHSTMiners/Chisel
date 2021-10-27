@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Skills</h1>
                <a type="button" href="{{ route('skill.create') }}" class="btn btn-primary btn-lg">Add skill 🤹</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Minimum</th>
                <th scope="col">Maximum</th>
                <th scope="col">Initial</th>
                <th scope="col">Default</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($skills as $currentSkill)
            <tr class="clickable-row" data-href="{{route('skill.edit', $currentSkill->id)}}">
                <th scope="row">{{$currentSkill->id}}</th>
                <td>{{$currentSkill->name}}</td>
                <td>{{$currentSkill->description}}</td>
                <td>{{$currentSkill->minimum}}</td>
                <td>{{$currentSkill->maximum}}</td>
                <td>{{$currentSkill->initial}}</td>
                <td>{{$currentSkill->default ? 'True' : 'False'}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
