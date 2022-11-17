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
        <div class="AccountBox CPN_RegisterBox">
            <h1>廠商註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <!-- 基本資料 -->
            <ul class="Section">
                <h3>公司基本資料</h3>
                <li>
                    <label for="compamny_name">公司名稱</label>
                    <input type="text" name="company_name" class="Account_text" style="width: 500px" placeholder="請輸入您的公司名稱">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label calss="" for="company_title">行業類別</label>
                    <input type="text" name="company_title" class="Account_text" placeholder="請輸入公司行業類別">
                </li>
                <li class="li-inline">
                    <label for="company_number">公司電話</label>
                    <input type="text" name="company_number" class="Account_text" placeholder="請輸入公司電話">
                </li>
                <li>
                    <label for="company_place">公司地點</label>
                    <input type="text" name="company_place" class="Account_text" style="width: 500px" placeholder="請輸入地址">
                </li>

                <li>
                    <label for="company_email">電子信箱</label>
                    <input type="text" name="company_email" class="Account_text" placeholder="請輸入您的 E-mail/電子信箱">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_username">帳號</label>
                    <input type="text" name="company_username" class="Account_text" placeholder="請輸入帳號">
                </li>
                <li class="li-inline">
                    <label for="company_password">密碼</label> <!-- 之後做按鈕讓密碼可以暫時顯示 -->
                    <input type="password" name="company_password" class="Account_text" placeholder="請輸入密碼">
                    <input type="hidden" name="sql_type" value = "insert">
                </li>
                <!-- 需求 -->
                <hr>
            </ul>

            <!-- <input type="submit" value="新增公司"> -->
            <!-- 登入 提交 -->
            <div class="bottom_row">
                <input class="submit_button" type="submit" value="提交" />
            </div>
            <!-- 回登入 回首頁 -->
            <a href="../../register_select.php"><img src="../../image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
            <a href="../../index.php"><img src="../../image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
        </div>

    </form>

    @endsection


    @section('footer')
        @parent
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        
    @endsection 
  
</body>