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
        <div id="container">
            <div class="Vacancies-Input-Box">
                <h1 class="text-center">職缺更新</h1>
                <div class="form-group col-12">
                    <label for="vacancies_name">職位名稱</label>
                    <input type="text" name="vacancies_name" class="form-control" placeholder="請輸入職位名稱">
                </div>
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group col-md-6 col-12">
                        <label for="company_money">工作待遇</label>
                        <input type="text" name="company_money" class="form-control" placeholder="請輸入工作待遇">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="company_time">工作時間</label>
                        <input type="text" name="company_time" class="form-control" placeholder="請輸入工作時間">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="company_time">工作地點</label>
                    <input type="text" name="company_place" class="form-control" placeholder="請輸入工作地點">
                </div>
                <div class="form-group col-12">
                    <label for="company_content">工作內容</label>
                    <textarea rows="5" contenteditable="true" type="text" name="company_content" class="form-control" placeholder="請輸入工作內容" style="height: 100px" id="compant_content"></textarea>
                </div>
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group col-md-6 col-12">
                        <label for="company_department">科系需求</label>
                        <input type="text" name="company_department" class="form-control" placeholder="科系需求限制">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="company_Education">教育程度</label>
                        <input type="text" name="company_Education" class="form-control" placeholder="教育程度限制">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="company_work_experience">工作經驗要求</label>
                    <input type="text" name="company_work_experience" class="form-control" placeholder="工作經驗要求">
                </div>
                <div class="form-group col-12">
                    <label for="company_other">其他補充事項</label>
                    <textarea type="text" name="company_other" class="form-control" placeholder="其他補充事項" id="compant_other"></textarea>
                </div>
                <div class="form-group col-12">
                    <label for="company_safe">員工保險</label>
                    <input type="text" name="company_safe" class="form-control" placeholder="請輸入員工保險">
                </div>
                <div class="Vacancies-Submit">
                    <input class="btn btn-dark w-100" type="submit" value="提交" />
                </div>
            </div>
        </div>
    </form>
    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>