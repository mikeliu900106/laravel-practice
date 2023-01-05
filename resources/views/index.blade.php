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

    <div id="container">
        <div class="row News-row">
            <div class="News col-lg-8 col-12">
                <div class="News-Title">
                    <h4>最新公告</h4>
                </div>
                <div class="News-Content">
                    <table>
                        <tbody>
                            <tr>
                                <td class="news_date">2077/5/12</td>
                                <td class="news_content"><a href="#">【實習】161-2學期實習課程說明，請自行注意相關時程(分發結果已公告)。</a></td>
                            </tr>
                            <tr>
                                <td class="news_date">2077/4/28</td>
                                <td class="news_content"><a href="#">【實習】台積電半導體趨勢講座暨學年實習說明會@建工、第一、楠梓，投遞截止日 166.05.28!!</a></td>
                            </tr>
                            <tr>
                                <td class="news_date">2077/4/14</td>
                                <td class="news_content"><a href="#">【轉知】2077德州儀器營運、財務暨供應鏈管理暑期實習計畫，歡迎碩士同學報名參加。</a></td>
                            </tr>
                            <tr>
                                <td class="news_date">2077/4/10</td>
                                <td class="news_content"><a href="#">【公告】台灣基隆地方法院暑期工讀報名簡章，詳情請見附件。</a></td>
                            </tr>
                            <tr>
                                <td class="news_date">2077/3/19</td>
                                <td class="news_content"><a href="#">【實習】🙌🏼國立海洋生物博物館實習招募中!! 截止日4/27!!!</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="News-More">
                        <!-- <button class="btn btn-secondary">更多資訊</button> -->
                    </div>
                </div>
            </div>
            <div class="News Jobs col-lg-4 col">
                <div class="News-Title Jobs-Title">
                    <h4>實習職缺</h4>
                </div>
                <div class="News-Content">
                    <ul class="New-Jobs">
                        <li><a href="#">明偉股份有限公司 後端工程師</a></li>
                        <li><a href="#">日月光半導體製造股份有限公司 助理儲備幹員</a></li>
                        <li><a href="#">OverWatch股份有限公司 遊戲工程師</a></li>
                        <li><a href="#">晅帥股份有限公司 前端工程師</a></li>
                        <li><a href="#">遠傳有限公司 門市人員</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Additional required wrapper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/img/01.jpg"></div>
                <div class="swiper-slide"><img src="/img/02.jpg"></div>
                <div class="swiper-slide"><img src="/img/03.jpg"></div>
                <div class="swiper-slide"><img src="/img/04.jpg"></div>
            </div>
            <!-- navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            rewind: true,
            // effect: 'fade',
            // on: {
            //     setTranslate: function() {
            //         this.$wrapperEl.trasition('')
            //         TweenMax.to(this.$wrapperEl, 1.5, {
            //             x: this.translate,
            //             ease: Power4.easeOut
            //         })
            //     }
            // },
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