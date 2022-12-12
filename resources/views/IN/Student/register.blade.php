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
        <div class="AccountBox">
            <h1>廠商註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <div class="Section">
                
                <div>
                    <input type="text" name="input_random" class="Account_text" placeholder="書入字串">
                    <input type="hidden" name="random" value = "{{$random}}">
                    <input type="hidden" name="user_id" value = "{{$student_datas["user_id"]}}">
                    <input type="hidden" name='username' value = "{{$student_datas['username']}}">
                    <input type="hidden" name='real_name' value = "{{$student_datas['real_name']}}">
                    <input type="hidden" name='student_id' value = "{{$student_datas['student_id']}}">
                    <input type="hidden" name='password' value = "{{$student_datas['password']}}">
                    <input type="hidden" name='email' value = "{{$student_datas['email']}}">
                    <label for="teacher_username">請輸入email內的字串</label>
                </div>
            </div>

            <!-- 登入 提交 -->
            <div class="bottom_row">
                <input class="submit_button" type="submit" value="提交" />
            </div>
            <!-- 回登入 回首頁 -->
    
        </div>
    </form>
    @endsection


    @section('footer')
        @parent
    @endsection 
  
</body>
    