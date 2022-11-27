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
    <form method="post" action="{{route("CompanyVacancies.update",$user_id)}}">
        @method("patch")
        @csrf
        <div class="AccountBox CPN_RegisterBox">
            <h1>職位更新</h1>
            <!-- 註冊資料輸入欄 -->
            <!-- 基本資料 -->
            <ul class="Section">
                <h3>徵才需求</h3>
                <li>
                    <label for="vacancies_name">職位名稱</label>
                    <input type="text" name="vacancies_name" class="Account_text" style="width: 500px" placeholder="請輸入工作內容">
                </li>
                <li class=" li-inline">
                    <label for="company_money">工作待遇</label>
                    <input type="text" name="company_money" class="Account_text" placeholder="請輸入工作待遇">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_time">工作時間</label>
                    <input type="text" name="company_time" class="Account_text" placeholder="請輸入工作時間">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_time">工作地點</label>
                    <input type="text" name="company_place" class="Account_text" placeholder="請輸入工作時間">
                </li>
                <li>
                    <label for="company_content">工作內容</label>
                    <input type="text" name="company_content" class="Account_text" style="width: 500px" placeholder="請輸入工作內容">
                </li>
            
                
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_work_experience">工作經驗要求</label>
                    <input type="text" name="company_work_experience" class="Account_text" placeholder="工作經驗要求">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_Education">教育程度</label>
                    <input type="text" name="company_Education" class="Account_text" placeholder="教育程度限制">
                </li>
                <li class="li-inline">
                    <label for="company_department">科系需求</label>
                    <input type="text" name="company_department" class="Account_text" placeholder="科系需求限制">
                </li>
                <li>
                    <label for="company_other">其他補充事項</label>
                    <input type="hidden" name="sql_type" value = "insert">
                    <textarea type="text" name="company_other" class="Account_text" placeholder="其他補充事項"></textarea>
                </li>
                <li class="li-inline">
                    <label for="company_safe">員工保險</label>
                    <input type="text" name="company_safe" class="Account_text" placeholder="請輸入員工保險">
                </li>

            </ul>

            <!-- <input type="submit" value="新增公司"> -->
            <!-- 登入 提交 -->
            <div class="bottom_row">
                <input class="submit_button" type="submit" value="提交" />
            </div>
        </div>
    </form>
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>