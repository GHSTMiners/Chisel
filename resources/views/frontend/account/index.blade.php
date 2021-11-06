@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>My Account</h1>
        </div>
        <div class="col-4">
            <a class="btn btn-danger float-end" href="{{ route('wallet_sign_out') }}" >Sign out</a>
        </div>
    </div>
</div>
@endsection
