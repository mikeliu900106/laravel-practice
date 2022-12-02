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

    <form action="{{ route('Login.store')}}" method="POST">
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>登入</h1>
            </div>
            <div class="Input-Section">
                <input class="Account-Text" type="text" placeholder="Username" name="login_username">
                <input class="Account-Text" type="password" placeholder="Password" name="login_password" />
                <div class="Help-Section">
                    <a href="{{route('Signup.index')}}">註冊</a>
                    <a href="forgetPW.php">忘記密碼?</a>
                </div>
                <div style="height: 5em"></div>
            </div>
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
        </div>
    </form>

    @endsection

    @section('footer')
    @parent
    @endsection
</body>