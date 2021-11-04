@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="swiper frontpage-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <video width="100%" height="100%" autoplay muted loop>
            <source src="assets/videos/slide1.mp4" type="video/mp4">
          Your browser does not support the video tag.
          </video>        
        </div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
</div>
@endsection
