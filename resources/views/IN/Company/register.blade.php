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
    <form method="post" action="{{route('Company.destroy',$company_id)}}">
        @method("delete")
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>廠商註冊</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <label for="input_random">請查收Email內的驗證碼</label>
                <input class="Account-Text" type="text" name="input_random" placeholder="請輸入驗證碼">
                <input type="hidden" name="random" value="{{$random}}">
                <input type="hidden" name="company_id" value="{{$company_datas["company_id"]}}">
                <input type="hidden" name="company_name" value="{{$company_datas["company_name"]}}">
                <input type="hidden" name="company_title" value="{{$company_datas["company_title"]}}">
                <input type="hidden" name="company_number" value="{{$company_datas["company_number"]}}">
                <input type="hidden" name="county" value="{{$company_datas["county"]}}">
                <input type="hidden" name="district" value="{{$company_datas["district"]}}">
                <input type="hidden" name="address" value="{{$company_datas["address"]}}">
                <input type="hidden" name="company_email" value="{{$company_datas["company_email"]}}">
                <input type="hidden" name="company_username" value="{{$company_datas["company_username"]}}">
                <input type="hidden" name="company_password" value="{{$company_datas["company_password"]}}">
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