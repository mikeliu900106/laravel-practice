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
    <form method="post" action="{{route('Company.store')}}">
        @csrf
        <div class="Account-Box">
            <!-- 回登入 回首頁 -->
            <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
            <div class="Title">
                <h1>廠商註冊</h1>
            </div>
            <!-- 基本資料 -->
            <div class="Input-Section CPN-Register">
                <ul>
                    <li class="row">
                        <div class="col" style="flex-grow: 2">
                            <label for="compamny_name">公司名稱</label>
                            <input type="text" name="company_name" class="Account-Text" placeholder="請輸入您的公司名稱">
                        </div>
                        <div class="col">
                            <label for=" company_title">行業類別</label>
                            <input type="text" name="company_title" class="Account-Text" placeholder="請輸入公司行業類別">
                        </div>
                    </li>
                    <li class="row">
                        <div class="col">
                            <label for="company_number">公司電話</label>
                            <input type="text" name="company_number" class="Account-Text" placeholder="請輸入公司電話">
                        </div>
                    </li>
                    <li class="row">
                        <div class="col">
                            <label for="company_place">公司地點</label>
                            <input type="text" name="company_place" class="Account-Text" placeholder="請輸入地址">
                        </div>
                    </li>

                    <li class="row">
                        <div class="col">
                            <label for="company_email">電子信箱</label>
                            <input type="text" name="company_email" class="Account-Text" placeholder="請輸入您的 E-mail/電子信箱">
                        </div>
                    </li>
                    <li class="row">
                        <div class="col">
                            <label for="company_username">帳號</label>
                            <input type="text" name="company_username" class="Account-Text" placeholder="請輸入帳號">
                        </div>
                        <div class="col">
                            <label for="company_password">密碼</label> <!-- 之後做按鈕讓密碼可以暫時顯示 -->
                            <input type="password" name="company_password" class="Account-Text" placeholder="請輸入密碼">
                            <input type="hidden" name="sql_type" value="insert">
                        </div>
                    </li>
                </ul>
            </div>

            <!-- <input type="submit" value="新增公司"> -->
            <!-- 登入 提交 -->
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
        </div>

    </form>

    @endsection


    @section('footer')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    @endsection

</body>