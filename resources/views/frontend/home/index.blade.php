@extends('frontend.layouts.app')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" deref/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="swiper frontpage-swiper">
      <div class="swiper-wrapper">
        @foreach ($worlds as $currentWorld)
            <div class="swiper-slide">
                <video width="100%" height="100%"  playsinline autoplay muted loop>
                <source src="storage/{{$currentWorld->video}}" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                <button type="button" data-href="/play?world={{$currentWorld->id}}"class="btn btn-dark btn-play">Play game</button>
          </div>
        @endforeach
        </div>
      {{-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> --}}
      <div class="swiper-pagination"></div>
    </div>
</div>
@endsection
