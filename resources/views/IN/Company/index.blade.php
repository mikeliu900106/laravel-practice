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
        <div class="Account-Box CPN-Register-Box">
            <!-- 回登入 回首頁 -->
            <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
            <div class="Title">
                <h1>廠商註冊</h1>
            </div>
            <!-- 基本資料 -->
            <div class="Input-Section CPN-Register">
                <div class="form-group">
                    <div class="col-md-4 col-12">
                        <label for="compamny_name">公司名稱</label>
                        <input type="text" name="company_name" class="Account-Text" placeholder="請輸入您的公司名稱">
                    </div>
                    <div class="col">
                        <label for=" company_title">行業類別</label>
                        <input type="text" name="company_title" class="Account-Text" placeholder="請輸入公司行業類別">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="company_number">公司電話</label>
                        <input type="text" name="company_number" class="Account-Text" placeholder="請輸入公司電話">
                    </div>
                </div>

                <div class="form-group" id="twzipcode">
                    <label class="col-12" for="twzipcode">公司地址</label>
                    <div class="w-100 d-flex flex-wrap">
                        <select class="col-md-6 col-12 form-select" name="county" aria-describedby="form-county" required=""></select>
                        <select class="col form-select" name="district" aria-describedby="form-district" zipcode-align="left" required=""></select>
                    </div>
                    <input class=" form-control" id="address" type="text" name="address" aria-describedby="form-address-input" required="" placeholder="路, 巷, 門牌, 樓層">
                    <input class="d-none" name="zipcode">
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="company_email">電子信箱</label>
                        <input type="text" name="company_email" class="Account-Text" placeholder="請輸入您的 E-mail/電子信箱">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="company_username">帳號</label>
                        <input type="text" name="company_username" class="Account-Text" placeholder="請輸入帳號">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="company_password">密碼</label> <!-- 之後做按鈕讓密碼可以暫時顯示 -->
                        <input type="password" name="company_password" class="Account-Text" placeholder="請輸入密碼">
                        <input type="hidden" name="sql_type" value="insert">
                    </div>
                </div>
            </div>
            <!-- 登入 提交 -->
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
        </div>
    </form>
    <script src="/erTWZipcode/er.twzipcode.data.js"></script>
    @endsection

    @section('footer')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset("erTWZipcode/er.twzipcode.data.js")}}"></script>
    <script src="{{asset("erTWZipcode/er.twzipcode.min.js")}}"></script>
    <script type="text/javascript">
        erTWZipcode();
    </script>
    @endsection

</body>