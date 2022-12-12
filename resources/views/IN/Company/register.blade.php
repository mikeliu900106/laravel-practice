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
        <div class="AccountBox">
            <h1>廠商註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <div class="Section">
                
                <div>
                    <input type="text" name="input_random" class="Account_text" placeholder="書入字串">
                    <input type="hidden" name="random" value = "{{$random}}">
                    <input type="hidden" name="company_id" value = "{{$company_datas["company_id"]}}">
                    <input type="hidden" name="company_name" value = "{{$company_datas["company_name"]}}">
                    <input type="hidden" name="company_title" value = "{{$company_datas["company_title"]}}">
                    <input type="hidden" name="company_number" value = "{{$company_datas["company_number"]}}">
                    <input type="hidden" name="county" value = "{{$company_datas["county"]}}">
                    <input type="hidden" name="district" value = "{{$company_datas["district"]}}">
                    <input type="hidden" name="address" value = "{{$company_datas["address"]}}">
                    <input type="hidden" name="company_email" value = "{{$company_datas["company_email"]}}">
                    <input type="hidden" name="company_username" value = "{{$company_datas["company_username"]}}">
                    <input type="hidden" name="company_password" value = "{{$company_datas["company_password"]}}">
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
    