@extends('backend.layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Wallets</h1>
                <a type="button" href="{{ route('wallet.create') }}" class="btn btn-primary btn-lg">Add wallet</a>
            </div>

        <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
            </div>
        </form>
        <table class="table table-striped table-bordered table-hover">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Address</th>
                <th scope="col">Chain ID</th>
                <th scope="col">Administrator</th>
                <th scope="col">Developer</th>
                <th scope="col">Moderator</th>
                <th scope="col">Created at</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($wallets as $currentWallet)
            <tr class="clickable-row" data-href="{{route('wallet.edit', $currentWallet->id)}}">
                <th scope="row">{{$currentWallet->id}}</th>
                @if($currentWallet->chain_id === 1)
                    <td><a href="https://etherscan.io/address/{{$currentWallet->address}}" target="_blank">{{$currentWallet->address}}</a></td>
                @elseif($currentWallet->chain_id == 137)
                    <td><a href="https://polygonscan.com/address/{{$currentWallet->address}}" target="_blank">{{$currentWallet->address}}</a></td>
                @else
                    <td>{{$currentWallet->address}}</td>
                @endif
                <td>{{$currentWallet->chain_id}}</td>
                <td>{{$currentWallet->role->admin ? '✔️' : '❌'}}</td>
                <td>{{$currentWallet->role->developer ? '✔️' : '❌'}}</td>
                <td>{{$currentWallet->role->moderator ? '✔️' : '❌'}}</td>
                <td>{{$currentWallet->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
        </table>

    </div>

    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            @for ($i = 0; $i < $pageCount; $i++)
                @if($i == $currentPage)
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{$i+1}}</span>
                    </li>
                @else
                    <li class="page-item"><a class="page-link" href="{{route('wallet.index', ['page' => $i])}}">{{$i+1}}</a></li>
                @endif
            @endfor
        </ul>
    </nav>

@endsection
