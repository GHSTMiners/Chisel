@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>API Keys</h1>
                <a type="button" href="{{ route('api-keys.create') }}" class="btn btn-primary btn-lg">Add key 🔑</a>
            </div>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Key</th>
                <th scope="col">Allowed IPs</th>
                <th scope="col">Notes</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($apiKeys as $currentApiKey)
            <tr class="clickable-row" data-href="{{route('api-keys.edit', $currentApiKey->id)}}">
                <th scope="row">{{$currentApiKey->id}}</th>
                <td>{{$currentApiKey->key}}</td>
                <td>{{ $currentApiKey->ips()->pluck('ip')->join(', ')}}</td>
                <td>{{$currentApiKey->notes}}</td>

            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

@endsection
