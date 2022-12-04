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
    <form method="post" action="{{route('Student.store')}}">
        @csrf
        <div class="Account-Box">
            <!-- 回登入 回首頁 -->
            <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
            <div class="Title">
                <h1>學生註冊</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <input class="Account-Text" type="text" placeholder="請輸入帳號" name="username" />
                <input class="Account-Text" type="text" placeholder="請輸入姓名" name="real_name" />
                <input class="Account-Text" type="password" placeholder="請輸入密碼" name="password" />
                <input class="Account-Text" type="text" placeholder="請輸入信箱" name="email" />
            </div>
            <!-- 提交 -->
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