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
    <form method="post" action="{{route('Teacher.store')}}">
        @csrf
        <div class="AccountBox">
            <h1>教師註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <div class="Section">
                
                <div>
                    <input type="text" name="teacher_username" class="Account_text" placeholder="Username">
                    <label for="teacher_username">請輸入帳號</label>
                </div>
                <div>
                    <input type="password" name="teacher_password" class="Account_text" placeholder="Password">
                    <label for="teacher_password">請輸入密碼</label>
                </div>
                <div>
                    <input type="text" name="teacher_real_name" class="Account_text" placeholder="Name">
                    <label for="teacher_real_name">請輸入姓名</label>
                </div>
                <div>
                    <input type="text" name="teacher_email" class="Account_text" placeholder="Email">
                    <label for="teacher_email">請輸入信箱</label>
                </div>
            </div>

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
    @endsection 
  
</body>
    