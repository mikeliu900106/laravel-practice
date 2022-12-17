<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent

@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    <form action="{{route('Teacher.store')}}" method="post">
        @csrf
        <div class="Account-Box Register-Select-Box">
            <div class="Title">
                <h1>註冊</h1>
            </div>
            <div class="Register-Select flex-grow-1 ">
                <a href="{{ route('Student.index')}}" class="Select-Box">
                    <img src="/img/STU.png" alt="">
                    <p>我是學生</p>
                </a>
                <a href="{{ route('Company.index')}}" class="Select-Box">
                    <img src="/img/CPN.png" alt="">
                    <p>我是廠商</p>
                </a>
                <a href="{{ route('Teacher.index')}}" class="Select-Box">
                    <img src="/img/TCH.png" alt="">
                    <p>我是教師</p>
                </a>
            </div>
            <div class="Submit-Section">
            </div>

            <!-- 回登入 回首頁 -->
            <a href="{{route('Login.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
        </div>
    </form>
    @endsection


    @section('footer')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    @endsection

</body>