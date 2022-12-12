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
                <div class="form-group w-100">
                    <label for="user_name">帳號</label>
                    <div class="Input-group w-100">
                        <input class="Account-Test" type="text" placeholder="Username" name="login_username">
                        <i class="bi bi-person"></i>
                    </div>
                    <span></span>
                </div>
                <div class="form-group w-100">
                    <label for="user_password">密碼</label>
                    <div class="Input-group w-100">
                        <input class="Account-Test" type="password" placeholder="Password" name="login_password" />
                        <i class="bi bi-lock"></i>
                    </div>
                    <!-- <span class="text-muted">至少8個字元</span> -->
                </div>
                <div class="Help-Section">
                    <a href="{{route('Signup.index')}}" style="margin-right: 5px;">註冊</a>
                    <a href="forgetPW.php">忘記密碼?</a>
                </div>
                <div style="height: 5em"></div>
            </div>
            <div class="Submit-Section">
                <button class="Submit-Button" type="submit" value="提交" id='login-submit'>提交</button>
            </div>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
        </div>
    </form>

    @endsection

    @section('footer')
    @parent
    @endsection
</body>