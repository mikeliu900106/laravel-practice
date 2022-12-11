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
    <form method="post" action="{{route("CompanyVacancies.store")}}">
        @csrf
        <div id="container" style="top: 0px !important;">
            <div class="Vacancies-Input-Box">
                <h1 class="text-center">職缺新增</h1>
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
                <div class="form-group" id="twzipcode">
                    <label class="col-12" for="twzipcode">工作地址</label>
                    <div class="w-100 d-flex flex-wrap">
                        <select class="col-md-6 col-12 form-select" name="county" aria-describedby="form-county" required=""></select>
                        <select class="col form-select" name="district" aria-describedby="form-district" zipcode-align="left" required=""></select>
                    </div>
                    <input class=" form-control" id="address" type="text" name="address" aria-describedby="form-address-input" required="" placeholder="路, 巷, 門牌, 樓層">
                    <input class="d-none" name="zipcode">
                </div>
                <div class="form-group col-12">
                    <label for="company_content">工作內容</label>
                    <textarea rows="5" contenteditable="true" type="text" name="company_content" class="form-control" placeholder="請輸入工作內容" style="height: 100px" id="compant_content"></textarea>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="javascript" id="inlineCheckbox1">
                    <label class="form-check-label" for="inlineCheckbox1">Javascript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="react" id="inlineCheckbox2">
                    <label class="form-check-label" for="inlineCheckbox2">React</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="vue" id="inlineCheckbox3">
                    <label class="form-check-label" for="inlineCheckbox3">Vue</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="Angular" id="inlineCheckbox4">
                    <label class="form-check-label" for="inlineCheckbox4">Angular</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="Mysql" id="inlineCheckbox5">
                    <label class="form-check-label" for="inlineCheckbox6">Mysql</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="SqlServer" id="inlineCheckbox6">
                    <label class="form-check-label" for="inlineCheckbox6">SqlServer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="Php" id="inlineCheckbox7">
                    <label class="form-check-label" for="inlineCheckbox7">Php</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="Laravel" id="inlineCheckbox8">
                    <label class="form-check-label" for="inlineCheckbox7">Laravel</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="c#" id="inlineCheckbox9">
                    <label class="form-check-label" for="inlineCheckbox7">c#</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="c++" id="inlineCheckbox10">
                    <label class="form-check-label" for="inlineCheckbox7">c++</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="java" id="inlineCheckbox11">
                    <label class="form-check-label" for="inlineCheckbox7">java</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="python" id="inlineCheckbox12">
                    <label class="form-check-label" for="inlineCheckbox7">python</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="vacancies_Skill[]" value="kotlin" id="inlineCheckbox13">
                    <label class="form-check-label" for="inlineCheckbox7">kotlin</label>
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
    <script src="/erTWZipcode/er.twzipcode.data.js"></script>
    <script>
        let oCompant_content = document.getElementById('compant_content');
        console.log(oCompant_content)
        oCompant_content.addEventListener('input', (e) => {
            oCompant_content.style.height = '102px';
            oCompant_content.style.height = e.target.scrollHeight + 'px';
        });
        compant_other.addEventListener('input', (e) => {
            compant_other.style.height = '64px';
            compant_other.style.height = e.target.scrollHeight + 'px';
        });
    </script>
    @endsection


    @section('footer')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset("erTWZipcode/er.twzipcode.data.js")}}"></script>
    <script src="{{asset("erTWZipcode/er.twzipcode.min.js")}}"></script>
    <script type="text/javascript">
        erTWZipcode();
    </script>

    @endsection
</body>

</html>