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
    <div class="title">
        <h1 class="word_main">practice</h1>
        <h1 class="word">change your life!</h1>
    </div>

    <div class="swiper mySwiper" style="height: 600px;">
        <!-- Additional required wrapper -->
        <div class="swiper mySwiper" style="height: 100%;">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/img/01.jpg" alt="" style="width: 100%"></div>
                <div class="swiper-slide"><img src="/img/02.jpg" alt="" style="width: 100%"></div>
                <div class="swiper-slide"><img src="/img/03.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>