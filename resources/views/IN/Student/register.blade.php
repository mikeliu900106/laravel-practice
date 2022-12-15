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
    {{$random }}

    <form method="post" action="{{route('Student.destroy',$user_id)}}">
        @method("delete")
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>學生註冊</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <label for="input_random">請查收Email內的驗證碼</label>
                <input class="Account-Text" type="text" name="input_random" placeholder="請輸入驗證碼">
                <input type="hidden" name="random" value="{{$random}}">
                <input type="hidden" name="user_id" value="{{$student_datas["user_id"]}}">
                <input type="hidden" name='username' value="{{$student_datas['username']}}">
                <input type="hidden" name='real_name' value="{{$student_datas['real_name']}}">
                <input type="hidden" name='student_id' value="{{$student_datas['student_id']}}">
                <input type="hidden" name='password' value="{{$student_datas['password']}}">
                <input type="hidden" name='email' value="{{$student_datas['email']}}">
                <!-- 目前無用 -->
                <a class="btn btn-primary text-white" href="#">重新寄送驗證碼</a>
            </div>

            <!-- 登入 提交 -->
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
            <!-- 回登入 回首頁 -->
            <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>

        </div>
    </form>
    @endsection


    @section('footer')
    @parent
    @endsection

</body>