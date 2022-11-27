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
        <div class="Account-Box">
            <!-- 回登入 回首頁 -->
            <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
            <div class="Title">
                <h1>教師註冊</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <input type="text" name="teacher_username" class="Account-Text" placeholder="請輸入帳號">
                <input type="password" name="teacher_password" class="Account-Text" placeholder="請輸入密碼">
                <input type="text" name="teacher_real_name" class="Account-Text" placeholder="請輸入姓名">
                <input type="text" name="teacher_email" class="Account-Text" placeholder="請輸入信箱">
            </div>
            <!-- 登入 提交 -->
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
        </div>
    </form>
    @endsection


    @section('footer')
    @parent
    @endsection

</body>