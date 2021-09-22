@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="d-flex justify-content-between pb-3">
                <h1>Crypto</h1>
                <a type="button" href="{{ route('crypto.create') }}" class="btn btn-primary btn-lg">Add crypto 🪙</a>
            </div>
        <div class="row">
        @foreach ($crypto as $currentCrypto)
                <div class="col-sm-4 pb-4">
                    <div class="card">
                        <img src="{{"/storage/".$currentCrypto->soil_image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-8">
                                    <h3 class="card-title">{{$currentCrypto->name}}</h3>
                                    <p class="card-text">Weight: {{$currentCrypto->weight}}</p>
                                    <p class="card-text text-truncate">Wallet address: {{$currentCrypto->wallet_address}}</p>
                                </div>
                                <div class="col-4">
                                    <img src="{{"/storage/".$currentCrypto->wallet_image}}" class="mx-auto d-block" style="width: 100%" alt="...">
                                </div>
                            </div>


                                <div class="row">

                                <div class="col">
                                    <a href="{{route('crypto.edit', $currentCrypto->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form method="POST" action="{{ route('crypto.destroy', [$currentCrypto->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="d-flex form-group justify-content-end">
                                                <input type="submit" class="btn btn-danger delete-crypto" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
