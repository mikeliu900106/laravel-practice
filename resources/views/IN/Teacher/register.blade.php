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
    {{$teacher_id}}
    <form method="post" action="{{route('Teacher.destroy',$teacher_id)}}">
        @method("delete")
        @csrf
        <div class="AccountBox">
            <h1>教師註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <div class="Section">
                
                <div>
                    <input type="text" name="input_random" class="Account_text" placeholder="書入字串">
                    <input type="hidden" name="random" value = "{{$random}}">
                    <input type="hidden" name="teacher_id" value = "{{$teacherdatas["teacher_id"]}}">
                    <input type="hidden" name="teacher_username" value = "{{$teacherdatas["teacher_username"]}}">
                    <input type="hidden" name="teacher_password" value = "{{$teacherdatas["teacher_password"]}}">
                    <input type="hidden" name="teacher_real_name" value = "{{$teacherdatas["teacher_real_name"]}}">
                    <input type="hidden" name="teacher_email" value = "{{$teacherdatas["teacher_email"]}}">
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
    