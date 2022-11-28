<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent
    <!-- <div class="title">
        <h1 class="word_main">practice</h1>
        <h1 class="word">change your life!</h1>
    </div> -->

    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/img/01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/img/02.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/img/03.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/img/04.jpg" alt=""></div>
            </div>
            <div class=" swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>

        <!-- navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            rewind: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>