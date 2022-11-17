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
            <form action = "{{ route('Login.store') }}" method ="POST">
                @csrf
                <div class="AccountBox">
                    <h1>登入</h1>
                    <!-- 帳密輸入欄 -->
                    <div class="Loginsection">
                        <input class="Account_text" type="text" placeholder="Username" name="login_username">
                        <a href="forgetPW.php">忘記密碼?</a>
                        <input class="Account_text" type="password" placeholder="Password" name="login_password" /> <br> <br>
                    </div>
                    <!-- 註冊 提交 -->
                    <div class="bottom_row">
                        <a href="register.php">註冊</a>
                        <input class="submit_button " type="submit" value="提交" />
                    </div>

                    <!-- 回首頁 -->
                    <a href="index.php"><img src="image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="50px"></a>
                </div>
            </form>
            
    @endsection


    @section('footer')
        @parent
   
    @endsection 
  
</body>



    
  